<?php

namespace App\Http\Controllers;

use App\Http\Requests\FacultyRequest;
use App\Imports\FacultyImport;
use App\Models\Faculty;
use App\Repositories\FacultyRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class FacultyController extends StislaController
{

    /**
     * constructor method
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->icon       = 'fa fa-university';
        $this->repository = new FacultyRepository;
        $this->prefix     = $this->viewFolder            = 'faculties';
        $this->pdfPaperSize = 'A2';
        // $this->import     = new FacultyImport;

        $this->defaultMiddleware($this->title = 'Fakultas');
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

            'name',
        ]);

        // $data['currency']     = idr_to_double($request->currency);
        // $data['currency_idr'] = rp_to_double($request->currency_idr);

        // if ($request->hasFile('file'))
        //     $data['file'] = $this->fileService->uploadFacultyFile($request->file('file'));

        // if ($request->hasFile('image'))
        //     $data['image'] = $this->fileService->uploadFacultyFile($request->file('image'));

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
        return $this->prepareIndex($request);
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
     * @param FacultyRequest $request
     * @return Response
     */
    public function store(FacultyRequest $request)
    {
        return $this->executeStore($request, withUser: true);
    }

    /**
     * showing edit data page
     *
     * @param Request $request
     * @param Faculty $faculty
     * @return Response
     */
    public function edit(Request $request, Faculty $faculty)
    {
        return $this->prepareDetailForm($request, $faculty);
    }

    /**
     * update data to db
     *
     * @param FacultyRequest $request
     * @param Faculty $faculty
     * @return Response
     */
    public function update(FacultyRequest $request, Faculty $faculty)
    {
        return $this->executeUpdate($request, $faculty, withUser: true);
    }

    /**
     * show detail page
     *
     * @param Request $request
     * @param Faculty $faculty
     * @return Response
     */
    public function show(Request $request, Faculty $faculty)
    {
        return $this->prepareDetailForm($request, $faculty, true);
    }

    /**
     * delete data from db
     *
     * @param Faculty $faculty
     * @return Response
     */
    public function destroy(Faculty $faculty)
    {
        // $this->fileService->deleteFacultyFile($faculty);
        return $this->executeDestroy($faculty);
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
