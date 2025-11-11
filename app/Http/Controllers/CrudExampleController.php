<?php

namespace App\Http\Controllers;

use App\Http\Requests\CrudExampleRequest;
use App\Imports\CrudExampleImport;
use App\Models\CrudExample;
use App\Repositories\CrudExampleRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
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
        parent::__construct();

        $this->icon       = 'fa fa-atom';
        $this->repository = new CrudExampleRepository;
        $this->prefix     = $this->viewFolder            = 'crud-examples';
        $this->pdfPaperSize = 'A2';
        $this->isCrud     = true;
        // $this->import     = new CrudExampleImport;

        $this->defaultMiddleware($this->title = 'Contoh CRUD');
    }

    /**
     * prepare store data
     *
     * @param CrudExampleRequest $request
     * @return array
     */
    public function getStoreData(CrudExampleRequest $request)
    {
        $data = $request->only([
            'text',
            'email',
            "number",
            "select",
            "textarea",
            "radio",
            "date",
            'checkbox',
            'checkbox2',
            "time",
            'tags',
            "color",
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

            //columns
        ]);

        if ($request->filled('is_active')) {
            $data['is_active'] = true;
        } else {
            $data['is_active'] = false;
        }

        if ($request->has('currency'))
            $data['currency']     = idr_to_double($request->currency);

        if ($request->has('currency_idr'))
            $data['currency_idr'] = rp_to_double($request->currency_idr);

        if ($request->hasFile('file'))
            $data['file'] = $this->fileService->uploadFileToFolder($request->file('file'), 'crud-examples/files');

        if ($request->hasFile('image'))
            $data['image'] = $this->fileService->uploadFileToFolder($request->file('image'), 'crud-examples/images');

        if ($request->hasFile('avatar'))
            $data['avatar'] = $this->fileService->uploadFileToFolder($request->file('avatar'), 'crud-examples/avatars');

        if ($request->password)
            $data['password'] = bcrypt($request->password);

        return $data;
    }

    /**
     * showing data page
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        return $this->prepareIndex($request, ['data' => $this->getIndexData()]);
    }

    /**
     * get data for index page
     *
     * @return Collection|null
     */
    public function getIndexData()
    {
        return $this->repository->getFullDataWith(
            [
                'createdBy',
                'lastUpdatedBy',
            ],
            where: [],
            whereHas: []
        );
    }

    /**
     * showing add new data page
     *
     * @param Request $request
     * @return Response
     */
    public function create(Request $request)
    {
        return $this->prepareCreateForm($request);
    }

    /**
     * save new data to db
     *
     * @param CrudExampleRequest $request
     * @return Response
     */
    public function store(CrudExampleRequest $request)
    {
        return $this->executeStore($request, withUser: true);
    }

    /**
     * showing edit data page
     *
     * @param Request $request
     * @param CrudExample $crudExample
     * @return Response
     */
    public function edit(Request $request, CrudExample $crudExample)
    {
        return $this->prepareDetailForm($request, $crudExample);
    }

    /**
     * update data to db
     *
     * @param CrudExampleRequest $request
     * @param CrudExample $crudExample
     * @return Response
     */
    public function update(CrudExampleRequest $request, CrudExample $crudExample)
    {
        return $this->executeUpdate($request, $crudExample, withUser: true);
    }

    /**
     * show detail page
     *
     * @param Request $request
     * @param CrudExample $crudExample
     * @return Response
     */
    public function show(Request $request, CrudExample $crudExample)
    {
        return $this->prepareDetailForm($request, $crudExample, true);
    }

    /**
     * delete data from db
     *
     * @param CrudExample $crudExample
     * @return Response
     */
    public function destroy(CrudExample $crudExample)
    {
        $this->fileService->deleteCrudExampleFile($crudExample);
        return $this->executeDestroy($crudExample);
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
