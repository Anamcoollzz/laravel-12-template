<?php

namespace App\Http\Controllers;

use App\Http\Requests\PicaRequest;
use App\Models\Pica;
use App\Models\Status;
use App\Repositories\CategoryRepository;
use App\Repositories\PicaRepository;
use App\Repositories\PocariFunctionRepository;
use App\Repositories\StatusRepository;
use App\Repositories\UserRepository;
use App\Repositories\WorkFieldRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\Request;

class PicaController extends StislaController
{

    protected PocariFunctionRepository $pocariFunctionRepository;
    protected WorkFieldRepository $workFieldRepository;
    protected StatusRepository $statusRepository;
    protected CategoryRepository $categoryRepository;
    protected UserRepository $userRepository;

    /**
     * constructor method
     *
     * @return void
     */
    public function __construct()
    {
        $this->title = 'Pica';

        parent::__construct();

        $this->icon         = 'fa fa-note-sticky';
        $this->repository   = new PicaRepository;
        $this->prefix       = $this->viewFolder = 'picas';

        // ini sesuaiin sama kebutuhan masing-masing, soalnya kalau A1 kan gede banget
        $this->pdfPaperSize = 'A3';
        $this->isAppCrud    = true;
        $this->request      = new PicaRequest;
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
        // $this->import     = new PicaImport;
        $this->withColumns = [
            'pocarifunction',
            'category',
            'workfield',
            'status',
            'assignedto',
        ];

        $this->defaultMiddleware($this->title);

        // $this->dd = true;

        $this->pocariFunctionRepository = new PocariFunctionRepository;
        $this->workFieldRepository = new WorkFieldRepository;
        $this->statusRepository = new StatusRepository;
        $this->categoryRepository = new CategoryRepository;
        $this->userRepository = new UserRepository;

        $this->isShowExportDatatable = false;
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
            $data['file'] = $this->fileUtil->uploadToFolder($request->file('file'), 'picas/files');

        if ($request->hasFile('attachment') && in_array('attachment', $columns))
            $data['attachment'] = $this->fileUtil->uploadToFolder($request->file('attachment'), 'picas/attachments');

        if ($request->hasFile('evidence') && in_array('evidence', $columns))
            $data['evidence'] = $this->fileUtil->uploadToFolder($request->file('evidence'), 'picas/evidences');

        if ($request->password  && in_array('password', $columns))
            $data['password'] = bcrypt($request->password);

        if (in_array('is_active', $columns))
            $data['is_active'] = $request->filled('is_active');

        if (Route::is('picas.store')) {
            $data['status_id'] = Status::STATUS_OPEN;
        }

        if ($request->has('next_status')) {
            $data['status_id'] = $request->input('next_status');
        }

        if ($request->has('status_id')) {
            $data['status_id'] = $request->input('status_id');
        }

        if ($request->has('revision_notes')) {
            $data['revision_notes'] = $request->input('revision_notes');
        }

        $data = array_merge($data, request()->only([
            'title',
            'notes',
            'function_id',
            'category_id',
            'work_field_id',
            'deadline',
            'kpi_related',
            'assigned_to',
            'created_date',
            'problem_identification',
            'corrective_action',
            // 'attachment',
            // 'evidence',
            // 'status_id',
        ]));

        // dd($request->all(), $data);

        return $data;
    }

    protected function afterStoreOrUpdate(Request $request, array $data, Model $model)
    {
        Mail::to('hairulanam21@gmail.com')->send(new \App\Mail\PicaMail($model));

        // kirim ke cabang
        if (filter_var($model->assignedto->email, FILTER_VALIDATE_EMAIL)) {
            Mail::to($model->assignedto->email)->send(new \App\Mail\PicaMail($model));
        }

        // kirim ke pusat
        if (filter_var($model->createdBy->email, FILTER_VALIDATE_EMAIL)) {
            Mail::to($model->createdBy->email)->send(new \App\Mail\PicaMail($model));
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

    /**
     * get form data
     *
     * @return array
     */
    protected function formData(): array
    {
        return [
            'function_id_options'   => $this->pocariFunctionRepository->getSelectOptions(),
            'work_field_id_options' => $this->workFieldRepository->getSelectOptions(),
            'status_id_options'     => $this->statusRepository->getSelectOptionsApproval(),
            'category_id_options'   => $this->categoryRepository->getSelectOptions(),
            'assigned_to_options'   => $this->userRepository->getSelectOptions(),
        ];
    }

    // public function indexData(Request $request)
    // {
    //     return $this->getIndexData2();
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
        )->when(request('filter_function'), function ($query) {
            $query->where('function_id', request('filter_function'));
        })->when(request('filter_category'), function ($query) {
            $query->where('category_id', request('filter_category'));
        })->when(request('filter_work_field'), function ($query) {
            $query->where('work_field_id', request('filter_work_field'));
        })->when(request('filter_status'), function ($query) {
            $query->where('status_id', request('filter_status'));
        })->when(request('filter_assigned_to'), function ($query) {
            $query->where('assigned_to', request('filter_assigned_to'));
        })
            ->when(Route::is('picas.on-progress'), function ($query) {
                $query->whereHas('status', function ($q) {
                    $q->where('name', 'On Progress');
                });
            })
            ->when(Route::is('picas.done'), function ($query) {
                $query->whereHas('status', function ($q) {
                    $q->where('name', 'Done');
                });
            })
            ->when(Route::is('picas.action-needed'), function ($query) {
                $query->whereHas('status', function ($q) {
                    $q->where(function ($q) {
                        $q->where('name', 'Need Approval')->orWhere('name', 'Need Revision');
                    });
                });
            })
            ->when(is_pusat(), function ($query) {
                // pusat hanya boleh lihat pica yang ditugaskan ke cabang di bawahnya
                // $query->where('created_by_id', auth_id());
            })
            ->when(is_cabang(), function ($query) {
                // cabang hanya boleh lihat pica yang dibuat oleh dirinya sendiri
                $query->where('assigned_to', auth_id());
            })
            // ->where('attachment', 'like', '%storage%')
            ->get();
    }
}
