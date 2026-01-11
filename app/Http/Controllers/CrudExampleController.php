<?php

namespace App\Http\Controllers;

use App\Http\Requests\CrudExampleRequest;
use App\Repositories\CrudExampleRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class CrudExampleController extends StislaController
{

    /**
     * constructor method
     *
     * @return void
     */
    public function __construct()
    {
        $this->title = 'Contoh CRUD';

        parent::__construct();

        $this->icon         = 'fa fa-atom';
        $this->repository   = new CrudExampleRepository;
        $this->prefix       = $this->viewFolder = 'crud-examples';

        // ini sesuaiin sama kebutuhan masing-masing, soalnya kalau A1 kan gede banget
        $this->pdfPaperSize = 'A1';
        $this->isAppCrud    = true;
        $this->request      = new CrudExampleRequest;
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
        // $this->import     = new CrudExampleImport;
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
            $data['file'] = $this->fileUtil->uploadToFolder($request->file('file'), 'crud-examples/files');

        if ($request->hasFile('image') && in_array('image', $columns))
            $data['image'] = $this->fileUtil->uploadToFolder($request->file('image'), 'crud-examples/images');

        if ($request->hasFile('avatar') && in_array('avatar', $columns))
            $data['avatar'] = $this->fileUtil->uploadToFolder($request->file('avatar'), 'crud-examples/avatars');

        if ($request->password  && in_array('password', $columns))
            $data['password'] = bcrypt($request->password);

        if (in_array('is_active', $columns))
            $data['is_active'] = $request->filled('is_active');

        //rostart//columns
        //roend

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

    public function semuaData()
    {
        $permissionPrefix = $this->title;
        $canCreate      = can($permissionPrefix . ' Tambah');
        $canUpdate      = can($permissionPrefix . ' Ubah');
        $canDuplicate   = can($permissionPrefix . ' Duplikat');
        $canDetail      = can($permissionPrefix . ' Detail');
        $canDelete      = can($permissionPrefix . ' Hapus');
        $canImportExcel = can($permissionPrefix . ' Impor Excel');
        $canExport      = can($permissionPrefix . ' Ekspor');
        $canForceLogin  = can($permissionPrefix . ' Force Login');
        $canBlock       = can($permissionPrefix . ' Blokir');
        $canFilterData  = can($permissionPrefix . ' Filter Data');
        $canShowDeleted = can($permissionPrefix . ' Terhapus') && method_exists($this->repository->getModel(), 'trashed');

        $routePrefix = 'contoh-crud';

        $data = array_merge([
            'canCreate'              => $canCreate,
            'canUpdate'              => $canUpdate,
            'canDetail'              => $canDetail,
            'canDelete'              => $canDelete,
            'canImportExcel'         => $canImportExcel,
            'canExport'              => $canExport,
            'canForceLogin'          => $canForceLogin,
            'canBlock'               => $canBlock,
            'canFilterData'          => $canFilterData,
            'canShowDeleted'         => $canShowDeleted,
            'canDuplicate'           => $canDuplicate,
            'title'                  => $permissionPrefix,
            'moduleIcon'             => $this->icon,
            'route_create'           => $canCreate ? route($routePrefix . '.tambah', ['filter_role' => request('filter_role')]) : null,
            'route_restore_all'      => $canShowDeleted && Route::has($routePrefix . '.restore-all') ? route($routePrefix . '.restore-all') : null,
            'route_force_delete_all' => $canShowDeleted && Route::has($routePrefix . '.force-delete-all') ? route($routePrefix . '.force-delete-all') : null,
            'routeImportExcel'       => $canImportExcel && Route::has($routePrefix . '.import-excel') ? route($routePrefix . '.import-excel', ['filter_role' => request('filter_role')]) : null,
            'routeExampleExcel'      => $canImportExcel && Route::has($routePrefix . '.import-excel') ? route($routePrefix . '.import-excel-example', ['filter_role' => request('filter_role')]) : null,
            'routePdf'               => $canExport && Route::has($routePrefix . '.pdf') ? route($routePrefix . '.pdf') : null,
            'routeExcel'             => $canExport && Route::has($routePrefix . '.excel') ? route($routePrefix . '.excel') : null,
            'routeCsv'               => $canExport && Route::has($routePrefix . '.csv') ? route($routePrefix . '.csv') : null,
            'routeJson'              => $canExport && Route::has($routePrefix . '.json') ? route($routePrefix . '.json') : null,
            'routeYajra'             => Route::has($routePrefix . '.ajax-yajra') ? route($routePrefix . '.ajax-yajra') : null,
            'routeStore'             => Route::has($routePrefix . '.store') ? route($routePrefix . '.store') : null,
            'routePrefix'            => $routePrefix,
            'isExport'               => false,
            'folder'                 => $routePrefix,
            'viewFolder'             => $this->viewFolder,
            'prefix'                 => $this->prefix ?? null,
            'isAppCrud'              => $this->isAppCrud,
            'htmlColumns'            => $this->htmlColumns,
            'fileColumns'            => $this->fileColumns,
            'pdfPaperSize'           => $this->pdfPaperSize,
            'isAjax' => true,

            // data
            'title' => 'Contoh CRUD',
            'data' => $this->getIndexData2(),
            'deletedData' => collect([]),
        ], $this->getHasColumns());

        if (request()->ajax()) {
            return response()->json([
                'success' => true,
                'data'    => view('stisla.' . $this->prefix . '.only-table', $data)->render(),
            ]);
        }

        return view('stisla.crud-examples.index', $data);
    }

    /**
     * prepare create form
     *
     * @param Request $request
     * @param array $data
     * @return Response
     */
    public function tambah(Request $request, array $data = [])
    {
        $fullTitle  = __('Tambah ' . $this->title);
        $data       = array_merge($this->getDefaultDataCreate($this->title, $this->prefix), $data, ['prefix' => $this->prefix]);
        $data       = array_merge($data, [
            'selectOptions'   => get_options(10, true),
            'select2Options'  => get_options(10),
            'radioOptions'    => get_options(4),
            'checkboxOptions' => get_options(5),
            'fullTitle'       => $fullTitle,
        ], $this->getHasColumns(), $this->formData(), [
            'action' => route('contoh-crud.tambah'),
        ]);

        if ($this->dd) {
            dd($data);
        }

        // return $data;

        if ($request->ajax()) {
            return view('stisla.crud-examples.only-form', $data);
        }

        if ($this->isCrud)
            return view('stisla.layouts.app-crud-form', $data);
        return view('stisla.crud-examples.form', $data);
    }

    /**
     * save data to db
     *
     * @param Request $request
     * @param bool|null $withUser
     * @return Response
     */
    public function post(Request $request, ?bool $withUser = false, ?callable $callback = null, ?array $data = [])
    {
        $request->validate([
            'text'              => 'required',
            'email'             => 'required|email|unique:crud_examples,email|max:100',
            "number"            => "required|numeric",
            "currency"          => "required",
            "currency_idr"      => "required",
            "select"            => "required",
            "select2"           => "required",
            "select2_multiple"  => "required|array",
            "textarea"          => "required",
            "checkbox"          => "required|array",
            "checkbox2"         => "required|array",
            "radio"             => "required",
            "file"              => "required|file",
            "image"             => "required|image",
            "date"              => "required|date",
            "time"              => "required",
            "color"             => "required",
            "summernote_simple" => "required",
            "summernote"        => "required",
            "barcode"           => "required",
            "qr_code"           => "required",
            'name'              => 'required|string|regex:/^[\pL\s.,]+$/u|max:50',
            'phone_number'      => 'required',
            'birthdate'         => 'required|date',
            'address'           => 'required',
            'password'          => 'required|min:6',
            'avatar'            => 'required|image',
        ]);

        $data   = array_merge($data, $this->getStoreData($request));
        $result = $withUser ? $this->repository->createWithUser($data) : $this->repository->create($data);
        logCreate($this->title, $result);
        $successMessage = successMessageCreate($this->title);

        if ($callback) {
            $callback($data, $result);
        }

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => $successMessage,
            ]);
        }

        if (is_app_pocari())
            return redirect()->route($this->prefix . '.index')->with('successMessage', $successMessage);

        return backSuccess($successMessage);
    }

    /**
     * prepare detail form
     *
     * @param Request $request
     * @param Model $model
     * @param bool $isDetail
     * @param array $data
     * @return Response
     */
    public function ubah(Request $request, $id, bool $isDetail = false, array $data = [])
    {
        $model      = $this->repository->findOrFail($id);
        $data = array_merge($this->getDetailData($model, $isDetail), $data, $this->formData());

        if ($request->ajax()) {
            return view('stisla.crud-examples.only-form', $data);
        }

        if ($this->isAppCrud) {
            return view('stisla.crud-examples.form', $data);
        }

        if ($this->isCrud)
            return view('stisla.layouts.app-crud-form', $data);

        return view('stisla.crud-examples.form', $data);
    }

    /**
     * execute update
     *
     * @param Request $request
     * @param Model $model
     * @param bool|null $withUser
     * @return Response
     */
    public function perbarui(Request $request, $id, ?bool $withUser = false)
    {
        $request->validate([
            'text'              => 'required',
            'email'             => 'required|email|unique:crud_examples,email,' . $id . ',id|max:100',
            "number"            => "required|numeric",
            "currency"          => "required",
            "currency_idr"      => "required",
            "select"            => "required",
            "select2"           => "required",
            "select2_multiple"  => "required|array",
            "textarea"          => "required",
            "checkbox"          => "required|array",
            "checkbox2"         => "required|array",
            "radio"             => "required",
            "file"              => 'nullable|file',
            "image"             => 'nullable|image',
            "date"              => "required|date",
            "time"              => "required",
            "color"             => "required",
            "summernote_simple" => "required",
            "summernote"        => "required",
            "barcode"           => "required",
            "qr_code"           => "required",
            'name'              => 'required|string|regex:/^[\pL\s.,]+$/u|max:50',
            'phone_number'      => 'required',
            'birthdate'         => 'required|date',
            'address'           => 'required',
            'password'          => 'nullable|min:6',
            'avatar'            => 'nullable|image',
        ]);
        $model = $this->repository->findOrFail($id);
        $data    = $this->getStoreData($request);
        $newData = $withUser ? $this->repository->updateWithUser($data, $model->id) : $this->repository->update($data, $model->id);
        logUpdate($this->title, $model, $newData);
        $successMessage = successMessageUpdate($this->title);

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => $successMessage,
            ]);
        }

        if (is_app_pocari())
            return redirect()->route($this->prefix . '.index')->with('successMessage', $successMessage);

        return backSuccess($successMessage);
    }

    /**
     * delete data from db
     *
     * @param string $id
     * @return Response
     */
    public function hapus(string $id)
    {
        $model = $this->repository->findOrFail($id);

        if (!Schema::hasColumn($model->getTable(), 'deleted_at'))
            $this->fileUtil->deleteFiles($model, $this->fileColumns);

        $this->repository->delete($model->id);
        logDelete($this->title, $model);
        $successMessage = successMessageDelete($this->title);

        if (request()->ajax()) {
            return response()->json([
                'success' => true,
                'message' => $successMessage,
            ]);
        }

        return backSuccess($successMessage);
    }
}
