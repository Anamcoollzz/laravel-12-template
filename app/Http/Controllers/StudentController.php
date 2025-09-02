<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Imports\StudentImport;
use App\Models\Student;
use App\Repositories\FacultyRepository;
use App\Repositories\StudentRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class StudentController extends StislaController
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
        $this->repository = new StudentRepository;
        $this->prefix     = $this->viewFolder            = 'students';
        $this->pdfPaperSize = 'A2';
        // $this->import     = new StudentImport;

        $this->defaultMiddleware($this->title = 'Mahasiswa');
    }

    /**
     * prepare store data
     *
     * @param StudentRequest $request
     * @return array
     */
    public function getStoreData(StudentRequest $request)
    {
        $data = $request->only([
            "name",
            "nim",
            "date_of_birth",
            "faculty_id",
        ]);

        // $data['currency']     = idr_to_double($request->currency);
        // $data['currency_idr'] = rp_to_double($request->currency_idr);

        // if ($request->hasFile('file'))
        //     $data['file'] = $this->fileService->uploadStudentFile($request->file('file'));

        // if ($request->hasFile('image'))
        //     $data['image'] = $this->fileService->uploadStudentFile($request->file('image'));

        return $data;
    }

    /**
     * showing student page
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        return $this->prepareIndex($request);
    }

    /**
     * showing add new student page
     *
     * @param Request $request
     * @return Response
     */
    public function create(Request $request)
    {
        return $this->prepareCreateForm($request, ['faculty_options' => (new FacultyRepository)->getSelectOptions()]);
    }

    /**
     * save new student to db
     *
     * @param StudentRequest $request
     * @return Response
     */
    public function store(StudentRequest $request)
    {
        return $this->executeStore($request, withUser: true);
    }

    /**
     * showing edit student page
     *
     * @param Request $request
     * @param Student $student
     * @return Response
     */
    public function edit(Request $request, Student $student)
    {
        return $this->prepareDetailForm($request, $student, false, ['faculty_options' => (new FacultyRepository)->getSelectOptions()]);
    }

    /**
     * update data to db
     *
     * @param StudentRequest $request
     * @param Student $student
     * @return Response
     */
    public function update(StudentRequest $request, Student $student)
    {
        return $this->executeUpdate($request, $student, withUser: true);
    }

    /**
     * show detail page
     *
     * @param Request $request
     * @param Student $student
     * @return Response
     */
    public function show(Request $request, Student $student)
    {
        return $this->prepareDetailForm($request, $student, true, ['faculty_options' => (new FacultyRepository)->getSelectOptions()]);
    }

    /**
     * delete student from db
     *
     * @param Student $student
     * @return Response
     */
    public function destroy(Student $student)
    {
        // $this->fileService->deleteStudentFile($student);
        return $this->executeDestroy($student);
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
