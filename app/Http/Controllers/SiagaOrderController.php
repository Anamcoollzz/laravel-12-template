<?php

namespace App\Http\Controllers;

use App\Http\Requests\SiagaOrderRequest;
use App\Repositories\SiagaOrderRepository;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class SiagaOrderController extends StislaController
{

    /**
     * constructor method
     *
     * @return void
     */
    public function __construct()
    {
        $this->title = 'Siaga Order';

        parent::__construct();

        $this->icon         = 'fa fa-truck-moving';
        $this->repository   = new SiagaOrderRepository;
        $this->prefix       = $this->viewFolder = 'siaga-orders';

        // ini sesuaiin sama kebutuhan masing-masing, soalnya kalau A1 kan gede banget
        $this->pdfPaperSize = 'A1';
        $this->isAppCrud    = true;
        $this->request      = new SiagaOrderRequest;
        $this->fileColumns  = [
            'file',
            'image',
            'avatar',
        ];
        $this->htmlColumns  = [
            'summernote',
            'summernote_simple',
            'tinymce',
            'ckeditor',
        ];
        // $this->import     = new SiagaOrderImport;
        $this->withColumns = [];

        $this->defaultMiddleware($this->title);

        // hidupkan jika ingin dd datanya
        // $this->dd = true;

        $this->isShowExportDatatable = true;
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
            $data['file'] = $this->fileUtil->uploadToFolder($request->file('file'), 'siaga-orders/files');

        if ($request->hasFile('image') && in_array('image', $columns))
            $data['image'] = $this->fileUtil->uploadToFolder($request->file('image'), 'siaga-orders/images');

        if ($request->hasFile('avatar') && in_array('avatar', $columns))
            $data['avatar'] = $this->fileUtil->uploadToFolder($request->file('avatar'), 'siaga-orders/avatars');

        if ($request->password  && in_array('password', $columns))
            $data['password'] = bcrypt($request->password);

        if (in_array('is_active', $columns))
            $data['is_active'] = $request->filled('is_active');

        $data = array_merge($data, request()->only([
            'full_name',
            'phone_number',
            'lokasi_keberangkatan',
            'alamat_tujuan',
            'car_type',
            'tgl_penggunaan',
            'perkiraan_jam',
            'additional_notes',
            'status',
        ]));

        return $data;
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

    /**
     * get form data
     *
     * @return array
     */
    // protected function formData(): array
    // {
    //     return [
    //         'function_id_options'   => $this->pocariFunctionRepository->getSelectOptions(),
    //         'work_field_id_options' => $this->workFieldRepository->getSelectOptions(),
    //         'status_id_options'     => $this->statusRepository->getSelectOptions(),
    //         'category_id_options'   => $this->categoryRepository->getSelectOptions(),
    //         'assigned_to_options'   => $this->userRepository->getSelectOptions(),
    //     ];
    // }

    /**
     * get data for index page
     *
     * @return Collection|null
     */
    public function getIndexData2(?bool $deleted = false)
    {
        return $this->repository->getFullDataWith(
            array_merge($this->withColumns, [
                'createdBy',
                'lastUpdatedBy',
            ]),
            where: [],
            whereHas: [],
            deleted: $deleted,
            isQueryBuilder: true
        )->when(request('filter_function_id'), function ($query) {
            $query->where('function_id', request('filter_function_id'));
        })->when(request('filter_category_id'), function ($query) {
            $query->where('category_id', request('filter_category_id'));
        })->when(request('filter_work_field_id'), function ($query) {
            $query->where('work_field_id', request('filter_work_field_id'));
        })->when(request('filter_status_id'), function ($query) {
            $query->where('status_id', request('filter_status_id'));
        })->get();
    }
}
