<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlumniRequest;
use App\Imports\AlumniImport;
use App\Models\Alumni;
use App\Repositories\AlumniRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class AlumniController extends StislaController
{

    /**
     * constructor method
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->icon       = 'fa fa-users';
        $this->repository = new AlumniRepository;
        $this->prefix     = $this->viewFolder            = 'alumnis';
        $this->pdfPaperSize = 'A2';
        // $this->import     = new AlumniImport;

        $this->defaultMiddleware($this->title = 'Alumni');
    }

    /**
     * prepare store data
     *
     * @return array
     */
    protected function getStoreData()
    {
        $request = request();
        $data = request()->only([
            'work_id',
        ]);

        // $data['currency']     = idr_to_double($request->currency);
        // $data['currency_idr'] = rp_to_double($request->currency_idr);

        // if ($request->hasFile('file'))
        //     $data['file'] = $this->fileService->uploadAlumniFile($request->file('file'));

        // if ($request->hasFile('image'))
        //     $data['image'] = $this->fileService->uploadAlumniFile($request->file('image'));

        // if ($request->hasFile('avatar'))
        //     $data['avatar'] = $this->fileService->uploadAlumniFile($request->file('avatar'));

        // if ($request->password) {
        //     $data['password'] = bcrypt($request->password);
        // }

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
     * @return Collection
     */
    protected function getIndexData()
    {
        return $this->repository->getAlumnis();
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
     * @param AlumniRequest $request
     * @return Response
     */
    public function store(AlumniRequest $request)
    {
        return $this->executeStore($request, withUser: true);
    }

    /**
     * showing edit data page
     *
     * @param Request $request
     * @param Alumni $alumni
     * @return Response
     */
    public function edit(Request $request, Alumni $alumni)
    {
        return $this->prepareDetailForm($request, $alumni);
    }

    /**
     * update data to db
     *
     * @param AlumniRequest $request
     * @param Alumni $alumni
     * @return Response
     */
    public function update(AlumniRequest $request, Alumni $alumni)
    {
        return $this->executeUpdate($request, $alumni, withUser: true);
    }

    /**
     * show detail page
     *
     * @param Request $request
     * @param Alumni $alumni
     * @return Response
     */
    public function show(Request $request, Alumni $alumni)
    {
        return $this->prepareDetailForm($request, $alumni, true);
    }

    /**
     * delete data from db
     *
     * @param Alumni $alumni
     * @return Response
     */
    public function destroy(Alumni $alumni)
    {
        // $this->fileService->deleteAlumniFile($alumni);
        return $this->executeDestroy($alumni);
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
