<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudyProgramRequest;
use App\Imports\StudyProgramImport;
use App\Models\StudyProgram;
use App\Repositories\FacultyRepository;
use App\Repositories\StudyProgramRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class StudyProgramController extends StislaController
{

    /**
     * constructor method
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->icon       = 'fa fa-book';
        $this->repository = new StudyProgramRepository;
        $this->prefix     = $this->viewFolder            = 'study-programs';
        $this->pdfPaperSize = 'A2';
        // $this->import     = new StudyProgramImport;

        $this->defaultMiddleware($this->title = 'Program Studi');
    }

    /**
     * prepare store data
     *
     * @param StudyProgramRequest $request
     * @return array
     */
    public function getStoreData(StudyProgramRequest $request)
    {
        $data = $request->only([
            'name',
            'faculty_id',
        ]);

        // $data['currency']     = idr_to_double($request->currency);
        // $data['currency_idr'] = rp_to_double($request->currency_idr);

        // if ($request->hasFile('file'))
        //     $data['file'] = $this->fileService->uploadStudyProgramFile($request->file('file'));

        // if ($request->hasFile('image'))
        //     $data['image'] = $this->fileService->uploadStudyProgramFile($request->file('image'));

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
        return $this->prepareIndex($request, ['data' => $this->repository->getFullDataWith(['faculty'])]);
    }

    /**
     * showing add new data page
     *
     * @param Request $request
     * @return Response
     */
    public function create(Request $request)
    {
        return $this->prepareCreateForm($request, ['faculty_options' => (new FacultyRepository)->getSelectOptions()]);
    }

    /**
     * save new data to db
     *
     * @param StudyProgramRequest $request
     * @return Response
     */
    public function store(StudyProgramRequest $request)
    {
        return $this->executeStore($request, withUser: true);
    }

    /**
     * showing edit data page
     *
     * @param Request $request
     * @param StudyProgram $studyProgram
     * @return Response
     */
    public function edit(Request $request, StudyProgram $studyProgram)
    {
        return $this->prepareDetailForm($request, $studyProgram, false, ['faculty_options' => (new FacultyRepository)->getSelectOptions()]);
    }

    /**
     * update data to db
     *
     * @param StudyProgramRequest $request
     * @param StudyProgram $studyProgram
     * @return Response
     */
    public function update(StudyProgramRequest $request, StudyProgram $studyProgram)
    {
        return $this->executeUpdate($request, $studyProgram, withUser: true);
    }

    /**
     * show detail page
     *
     * @param Request $request
     * @param StudyProgram $studyProgram
     * @return Response
     */
    public function show(Request $request, StudyProgram $studyProgram)
    {
        return $this->prepareDetailForm($request, $studyProgram, true, ['faculty_options' => (new FacultyRepository)->getSelectOptions()]);
    }

    /**
     * delete data from db
     *
     * @param StudyProgram $studyProgram
     * @return Response
     */
    public function destroy(StudyProgram $studyProgram)
    {
        // $this->fileService->deleteStudyProgramFile($studyProgram);
        return $this->executeDestroy($studyProgram);
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
