<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Imports\StudentImport;
use App\Models\Student;
use App\Repositories\StudentRepository;
use App\Repositories\StudyProgramRepository;
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
            // "birth_date",
            "study_program_id",
            // "user_id",
            "class_year",
            "student_status",
            // "graduation_year",
        ]);

        // $data['currency']     = idr_to_double($request->currency);
        // $data['currency_idr'] = rp_to_double($request->currency_idr);

        if ($request->hasFile('photo'))
            $data['photo'] = $this->fileService->uploadPhoto($request->file('photo'));

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
        return $this->prepareIndex($request, ['data' => $this->repository->getFullDataWith(['studyProgram.faculty', 'user'])]);
    }

    /**
     * showing add new student page
     *
     * @param Request $request
     * @return Response
     */
    public function create(Request $request)
    {
        return $this->prepareCreateForm($request, ['prodi_options' => (new StudyProgramRepository)->getSelectOptions()]);
    }

    /**
     * save new student to db
     *
     * @param StudentRequest $request
     * @return Response
     */
    public function store(StudentRequest $request)
    {
        $data = $this->userRepository->create([
            'name'         => $request->name,
            'email'        => $request->email,
            'password'     => bcrypt($request->password),
            'phone_number' => $request->phone_number,
            'birth_date'   => $request->birth_date,
            'address'      => $request->address,
        ]);
        return $this->executeStore($request, withUser: true, data: ['user_id' => $data->id]);
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
        return $this->prepareDetailForm($request, $student, false, ['prodi_options' => (new StudyProgramRepository)->getSelectOptions()]);
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
        $this->userRepository->update([
            'name'         => $request->name,
            'email'        => $request->email,
            'password'     => $request->password ? bcrypt($request->password) : $student->user?->password,
            'phone_number' => $request->phone_number,
            'birth_date'   => $request->birth_date,
            'address'      => $request->address,
        ], $student->user_id);
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
        return $this->prepareDetailForm($request, $student, true, ['prodi_options' => (new StudyProgramRepository)->getSelectOptions()]);
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
