<?php

namespace App\Http\Controllers;

use App\Http\Requests\FacultyLeaderRequest;
use App\Imports\FacultyLeaderImport;
use App\Models\FacultyLeader;
use App\Repositories\FacultyLeaderRepository;
use App\Repositories\FacultyRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class FacultyLeaderController extends StislaController
{

    private int $user_id;

    /**
     * constructor method
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->icon       = 'fa fa-user-plus';
        $this->repository = new FacultyLeaderRepository;
        $this->prefix     = $this->viewFolder            = 'faculty-leaders';
        $this->pdfPaperSize = 'A2';
        // $this->import     = new FacultyLeaderImport;

        $this->defaultMiddleware($this->title = 'Pimpinan Fakultas');
    }

    /**
     * prepare store data
     *
     * @return array
     */
    protected function getStoreData()
    {
        $user = $request->only([
            'name',
            'email',
            'phone_number',
            'address',
            'birth_date',
        ]);
        if ($request->password)
            $user['password'] = bcrypt($request->password);
        if ($this->user_id) {
            $user = $this->userRepository->update($user, $this->user_id);
        } else {
            $user = $this->userRepository->create($user);
        }
        $user->assignRole('pimpinan fakultas');
        $request = request();
        $data = request()->only([
            // 'name',
            'faculty_id',
        ]);
        $data['user_id'] = $user->id;

        // $data['currency']     = idr_to_double($request->currency);
        // $data['currency_idr'] = rp_to_double($request->currency_idr);

        // if ($request->hasFile('file'))
        //     $data['file'] = $this->fileService->uploadFacultyLeaderFile($request->file('file'));

        // if ($request->hasFile('image'))
        //     $data['image'] = $this->fileService->uploadFacultyLeaderFile($request->file('image'));

        // if ($request->hasFile('avatar'))
        //     $data['avatar'] = $this->fileService->uploadFacultyLeaderFile($request->file('avatar'));

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
        return $this->prepareIndex($request, [
            'data' => $this->repository->getFullDataWith(['createdBy', 'lastUpdatedBy', 'faculty']),
        ]);
    }

    /**
     * showing add new data page
     *
     * @param Request $request
     * @return Response
     */
    public function create(Request $request)
    {
        return $this->prepareCreateForm($request, ['faculty_options' => (new FacultyRepository)->getSelectOptions(),]);
    }

    /**
     * save new data to db
     *
     * @param FacultyLeaderRequest $request
     * @return Response
     */
    public function store(FacultyLeaderRequest $request)
    {
        return $this->executeStore($request, withUser: true);
    }

    /**
     * showing edit data page
     *
     * @param Request $request
     * @param FacultyLeader $facultyLeader
     * @return Response
     */
    public function edit(Request $request, FacultyLeader $facultyLeader)
    {
        return $this->prepareDetailForm($request, $facultyLeader, false, ['faculty_options' => (new FacultyRepository)->getSelectOptions(),]);
    }

    /**
     * update data to db
     *
     * @param FacultyLeaderRequest $request
     * @param FacultyLeader $facultyLeader
     * @return Response
     */
    public function update(FacultyLeaderRequest $request, FacultyLeader $facultyLeader)
    {
        $this->user_id = $facultyLeader->user_id;
        return $this->executeUpdate($request, $facultyLeader, withUser: true);
    }

    /**
     * show detail page
     *
     * @param Request $request
     * @param FacultyLeader $facultyLeader
     * @return Response
     */
    public function show(Request $request, FacultyLeader $facultyLeader)
    {
        return $this->prepareDetailForm($request, $facultyLeader, true, ['faculty_options' => (new FacultyRepository)->getSelectOptions(),]);
    }

    /**
     * delete data from db
     *
     * @param FacultyLeader $facultyLeader
     * @return Response
     */
    public function destroy(FacultyLeader $facultyLeader)
    {
        // $this->fileService->deleteFacultyLeaderFile($facultyLeader);
        return $this->executeDestroy($facultyLeader);
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
