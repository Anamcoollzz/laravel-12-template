<?php

namespace App\Http\Controllers;

use App\Http\Requests\FingerPrintX105IdRequest;
use App\Repositories\FingerprintMachineRepository;
use App\Repositories\FingerPrintX105IdRepository;
use App\Services\FingerPrintService;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class FingerPrintX105IdController extends StislaController
{

    private FingerPrintService $fingerPrintService;

    /**
     * constructor method
     *
     * @return void
     */
    public function __construct()
    {
        $this->title = 'Sidik Jari X105 ID';

        parent::__construct();

        $this->icon         = 'fa fa-fingerprint';
        $this->repository   = new FingerPrintX105IdRepository;
        $this->prefix       = $this->viewFolder = 'finger-print-x105-ids';
        $this->pdfPaperSize = 'A2';
        $this->isAppCrud    = true;
        $this->request      = new FingerPrintX105IdRequest;
        $this->fingerPrintService = new FingerPrintService;
        $this->fileColumns  = [
            'file',
            'image',
            'avatar',
        ];
        $this->htmlColumns  = [
            // 'summernote',
            // 'summernote_simple',
            // 'tinymce',
            // 'ckeditor',
        ];
        $this->withColumns  = [
            'machine',
        ];
        // $this->import     = new FingerPrintX105IdImport;

        $this->defaultMiddleware($this->title);
    }

    /**
     * prepare store data
     *
     * @return array
     */
    protected function getStoreData()
    {
        $request = request();

        $columns = $this->repository->getColumns();

        $data = [];

        $formColumns = [
            'text',
            'email',
            'number',
            'select',
            'textarea',
            'radio',
            'date',
            'checkbox',
            'checkbox2',
            'time',
            'tags',
            'color',
            'select2',
            'select2_multiple',
            'summernote',
            'summernote_simple',
            'barcode',
            'qr_code',
            'name',
            'phone_number',
            'birthdate',
            'address',
            'tinymce',
            'ckeditor',
        ];

        foreach ($formColumns as $column) {
            if (in_array($column, $columns) && $request->has($column)) {
                $data[$column] = $request->input($column);
            }
        }

        if ($request->has('currency') && in_array('currency', $columns))
            $data['currency'] = idr_to_double($request->currency);

        if ($request->has('currency_idr') && in_array('currency_idr', $columns))
            $data['currency_idr'] = rp_to_double($request->currency_idr);

        if ($request->hasFile('file') && in_array('file', $columns))
            $data['file'] = $this->fileUtil->uploadToFolder($request->file('file'), 'finger-print-x105-ids/files');

        if ($request->hasFile('image') && in_array('image', $columns))
            $data['image'] = $this->fileUtil->uploadToFolder($request->file('image'), 'finger-print-x105-ids/images');

        if ($request->hasFile('avatar') && in_array('avatar', $columns))
            $data['avatar'] = $this->fileUtil->uploadToFolder($request->file('avatar'), 'finger-print-x105-ids/avatars');

        if ($request->password  && in_array('password', $columns))
            $data['password'] = bcrypt($request->password);

        if (in_array('is_active', $columns))
            $data['is_active'] = $request->filled('is_active');

        $data = array_merge($data, request()->only([
            'machine_id',
            'pin',
            'date_time',
            'verified',
            'status',
            'work_code',
        ]));

        return $data;
    }

    /**
     * additional index data
     *
     * @return array
     */
    protected function additionalIndexData(): array
    {
        return [
            'machines' => app(FingerprintMachineRepository::class)->getSelectOptions('label', 'value', map: function ($item) {
                return collect([
                    'label' => $item->machine_name . ' (' . $item->ip . ')',
                    'value' => $item->id,
                ]);
            }),
        ];
    }

    /**
     * get attendance log from finger print machine
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getAttendanceLog()
    {
        try {
            $machineId = request()->input('filter_machine_id');
            $machine = app(FingerprintMachineRepository::class)->findOrFail($machineId);
            $logs = $this->fingerPrintService->getAttendanceLog105Id(isDummy: true, fingerprintMachine: $machine);
            if ($logs === FingerPrintService::NO_IP) {
                // session()->flash('error', 'IP mesin sidik jari belum diatur.');
            } else if ($logs == FingerPrintService::ERROR_CONNECT) {
                // session()->flash('error', 'Gagal terhubung ke mesin sidik jari. Periksa koneksi jaringan dan pengaturan IP mesin.');
            } else {
                $logs = $this->fingerPrintService->parseAll($logs);
                $logs->chunk(5000)->each(function ($chunk) use ($machineId) {
                    $chunk->each(function ($item) use ($machineId) {
                        $this->repository->updateOrCreate([
                            'pin'       => (string) $item->PIN,
                            'date_time' => (string) $item->DateTime,
                            'verified'  => (string) $item->Verified,
                            'status'    => (string) $item->Status,
                            'work_code' => (string) $item->WorkCode,
                            'machine_id' => (int) $machineId,
                        ], []);
                    });
                });
                return backSuccess('Berhasil menarik data log kehadiran dari mesin sidik jari.');
            }
        } catch (\Exception $e) {
            return backError($e->getMessage());
        }
    }

    /**
     * download import example
     *
     * @return BinaryFileResponse
     */
    public function importExcelExample(): BinaryFileResponse
    {
        // bisa gunakan file excel langsung sebagai contoh
        // $filepath = public_path('example.xlsx');
        // return response()->download($filepath);

        return $this->executeImportExcelExample();
    }
}
