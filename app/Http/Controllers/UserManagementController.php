<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImportExcelRequest;
use App\Http\Requests\UserRequest;
use App\Imports\UserImport;
use App\Models\Role;
use App\Models\User;
use App\Repositories\ClassLevelRepository;
use App\Repositories\RegionRepository;
use App\Repositories\ReligionRepository;
use App\Repositories\SchoolClassRepository;
use App\Repositories\WorkRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class UserManagementController extends StislaController
{

    private ReligionRepository $religionRepository;
    private SchoolClassRepository $schoolClassRepository;
    private WorkRepository $workRepository;
    private RegionRepository $regionRepository;
    private Role|null $role;
    private ClassLevelRepository $classLevelRepository;

    /**
     * constructor method
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->defaultMiddleware('Pengguna');

        $this->icon       = 'fa fa-users';
        $this->viewFolder = 'user-management';
        $this->prefix     = 'user-management.users';
        $this->paperSize  = 'A3';

        $this->religionRepository    = new ReligionRepository;
        $this->schoolClassRepository = new SchoolClassRepository;
        $this->workRepository        = new WorkRepository;
        $this->regionRepository      = new RegionRepository;
        $this->classLevelRepository  = new ClassLevelRepository;

        if (is_app_dataku() && request('filter_role')) {
            $this->role        = $this->userRepository->findRole(request('filter_role'));
            $this->exportTitle = is_app_dataku() && $this->role ? ucfirst($this->role->name) : 'Pengguna';
        }
    }

    /**
     * get index data
     *
     * @return array
     */
    protected function getIndexData()
    {
        $roleOptions = $this->userRepository->getRoleOptions(is_kepala_sekolah() ? ['siswa', 'guru'] : []);
        $defaultData = $this->getDefaultDataIndex(__('Pengguna'), 'Pengguna', 'user-management.users');
        return array_merge($defaultData, [
            'data'           => $this->userRepository->getUsers(),
            'roleCount'      => count($roleOptions),
            'isRegionExists' => Schema::hasTable('regions'),
            'roleOptions'    => $roleOptions,
            'isSiswa'        => request('filter_role') === '4',
        ]);
    }

    /**
     * get store data
     *
     * @return array
     */
    protected function getStoreData()
    {
        $request = request();
        $data = request()->only([
            'name',
            'email',
            'phone_number',
            'birth_date',
            'address',
        ]);

        if (is_app_dataku()) {
            $data = array_merge($data, request()->only([
                'nis',
                'nisn',
                'religion_id',
                'religion_id',
                'rt',
                'rw',
                'postal_code',
                'school_class_id',
                'school_class_id',
                'room',
                'father_nik',
                'father_name',
                'father_birth_date',
                'father_education',
                'father_work_id',
                'father_work_id',
                'father_income',
                'mother_nik',
                'mother_name',
                'mother_birth_date',
                'mother_education',
                'mother_work_id',
                'mother_work_id',
                'mother_income',
                'guardian_nik',
                'guardian_name',
                'guardian_birth_date',
                'guardian_education',
                'guardian_work_id',
                'guardian_work_id',
                'guardian_income',
                'province_code',
                'city_code',
                'district_code',
                'village_code',
                'class_level_id',

                // teacher data
                'teacher_nuptk',
                'teacher_mother_name',
                'teacher_employee_status',
                'teacher_gtk_type',
                'teacher_position',
            ]));
        }

        $numberColumns = [
            'father_income',
            'mother_income',
            'guardian_income',
        ];

        foreach ($numberColumns as $column) {
            if ($request->has($column))
                $data[$column] = rp_to_double($request->$column);
        }

        $data['education_level_id'] = session('education_level_id');

        if ($request->hasFile('avatar'))
            $data['avatar'] = $this->fileService->uploadAvatar($request->file('avatar'));
        if ($request->filled('password'))
            $data['password'] = bcrypt($request->password);
        return $data;
    }

    /**
     * get detail data
     *
     * @param User $user
     * @param boolean $isDetail
     * @return array
     */
    protected function getDetailDataOld(User $user, bool $isDetail)
    {
        $roleOptions = $this->userRepository->getRoleOptions();
        if ($user->roles->count() > 1)
            $user->role = $user->roles->pluck('id')->toArray();
        else
            $user->role = $user->roles->first()->id ?? null;
        $defaultData = $this->getDefaultDataDetail(__('Pengguna'), 'user-management.users', $user, $isDetail);
        return array_merge($defaultData, [
            'roleOptions'        => $roleOptions,
            'fullTitle'          => $isDetail ? __('Detail Pengguna') : __('Ubah Pengguna'),
            'religionOptions'    => $this->religionRepository->getSelectOptions('religion_name'),
            'schoolClassOptions' => $this->schoolClassRepository->getSelectOptions('class_name'),
            'classLevelOptions'  => $this->classLevelRepository->getSelectOptions('level_name'),
            'workOptions'        => $this->workRepository->getSelectOptions('job_name'),
            'provinces'          => $this->regionRepository->getProvinces(),
            'roleName'           => $user->roles->first()->name ?? null,
            'roleId'             => $user->roles->first()->id ?? null,
            'isSiswa'            => $user->hasRole('siswa'),
        ]);
    }

    /**
     * get export data
     *
     * @return array
     */
    protected function getExportData(): array
    {
        $times = date('Y-m-d_H-i-s');
        $role = $this->userRepository->findRole(request('filter_role'));
        $suffix = is_app_dataku() ? '_dataku_' . Str::snake($role->name) : '';
        $data = [
            'isExport'   => true,
            'pdf_name'   => $times . '_users' . $suffix . '.pdf',
            'excel_name' => $times . '_users' . $suffix . '.xlsx',
            'csv_name'   => $times . '_users' . $suffix . '.csv',
            'json_name'  => $times . '_users' . $suffix . '.json',
        ];
        return array_merge($this->getIndexData(), $data);
    }

    /**
     * showing user management page
     *
     * @return Response
     */
    public function index()
    {
        if (is_app_dataku() && request('filter_role') === null) {
            return redirect()->route('user-management.users.index', ['filter_role' => is_kepala_sekolah() ? '3' : '1']);
        }

        if (is_kepala_sekolah() || is_guru()) {
            if (is_kepala_sekolah() && request('filter_role') && !in_array(request('filter_role'), ['3', '4', '2'])) {
                abort(403, 'Anda tidak memiliki akses ke halaman ini.');
            }
            if (is_guru() && request('filter_role') != '3') {
                return abort(403, 'Anda tidak memiliki akses ke halaman ini.');
            }
        }

        $data = $this->getIndexData();
        // return $data;
        return view('stisla.user-management.users.index', $data);
    }

    /**
     * showing add new user page
     *
     * @return Response
     */
    public function create()
    {
        $roleOptions = $this->userRepository->getRoleOptions();
        $role        = $this->userRepository->findRole(request('filter_role'));
        $isSiswa     = $role ? $role->name === 'siswa' : false;
        $defaultData = $this->getDefaultDataCreate(__('Pengguna'), 'user-management.users');
        $data        = array_merge($defaultData, [
            'roleOptions'        => $roleOptions,
            'fullTitle'          => __('Tambah Pengguna'),
            'religionOptions'    => $this->religionRepository->getSelectOptions('religion_name'),
            'schoolClassOptions' => $this->schoolClassRepository->getSelectOptions('class_name'),
            'workOptions'        => $this->workRepository->getSelectOptions('job_name'),
            'provinces'          => $this->regionRepository->getProvinces(),
            'classLevelOptions'  => $this->classLevelRepository->getSelectOptions('level_name'),
            'isSiswa'            => $isSiswa,
            'roleName'           => $role->name,
            'roleId'             => $role->id ?? null,
        ]);
        // return $data;
        return view('stisla.user-management.users.form', $data);
    }

    /**
     * save new user to db
     *
     * @param UserRequest $request
     * @return Response
     */
    public function store(UserRequest $request)
    {
        $data = $this->getStoreData($request);
        $data['created_by_id'] = auth_id();
        $data['uuid'] = uuid();
        // $data['last_updated_by_id'] = auth_id();
        $user = $this->userRepository->create($data);
        $roles = is_numeric($request->role) ? [$request->role] : $request->role;
        $this->userRepository->syncRolesByID($user, $roles);
        logCreate('Pengguna', $user);
        $successMessage = successMessageCreate('Pengguna');
        return redirect()->back()->with('successMessage', $successMessage);
    }

    /**
     * check user role for kepala sekolah and guru
     *
     * @param User $user
     * @return void
     */
    private function checkRole(User $user)
    {
        $roleId = $user->roles->first()->id ?? null;
        if (is_kepala_sekolah()) {
            if ($roleId && !in_array($roleId, ['3', '4', '2'])) {
                abort(403, 'Anda tidak memiliki akses ke halaman ini.');
            }
            if ($user->hasRole('siswa')) {
            } else {
                if ($user->id != auth_id()) {
                    abort(403, 'Anda tidak memiliki akses ke halaman ini.');
                }
            }
        } else if (is_guru()) {
            if (auth_user()->id !== $user->id) {
                abort(403, 'Anda tidak memiliki akses ke halaman ini.');
            }
        }
    }

    /**
     * showing edit user page
     *
     * @param User $user
     * @return Response
     */
    public function edit(User $user)
    {
        $this->checkRole($user);

        $data = $this->getDetailDataOld($user, false);
        $isSiswa = $user->hasRole('siswa');
        $data = array_merge($data, [
            'isSiswa' => $isSiswa,
        ]);
        return view('stisla.user-management.users.form', $data);
    }

    /**
     * update user to db
     *
     * @param UserRequest $request
     * @param User $user
     * @return Response
     */
    public function update(UserRequest $request, User $user)
    {
        $this->checkRole($user);

        $data = $this->getStoreData($request);
        $data['last_updated_by_id'] = auth_id();

        $userNew = $this->userRepository->update($data, $user->id);
        $roles = is_numeric($request->role) ? [$request->role] : $request->role;
        $this->userRepository->syncRolesByID($userNew, $roles);
        logUpdate('Pengguna', $user, $userNew);
        $successMessage = successMessageUpdate('Pengguna');
        return redirect()->back()->with('successMessage', $successMessage);
    }

    /**
     * showing detail user page
     *
     * @param User $user
     * @return Response
     */
    public function show(User $user)
    {
        $this->checkRole($user);

        $data = $this->getDetailDataOld($user, true);
        return view('stisla.user-management.users.form', $data);
    }

    /**
     * delete user from db
     *
     * @param User $user
     * @return Response
     */
    public function destroy(User $user)
    {
        $this->checkRole($user);

        if (request('force_delete')) {
            $this->userRepository->delete($user->id);
        } else {
            $this->userRepository->softDelete($user->id);
        }
        logDelete('Pengguna', $user);
        $successMessage = successMessageDelete('Pengguna');
        return backSuccess($successMessage);
    }

    /**
     * force login with specific user
     *
     * @param User $user
     * @return Response
     */
    public function forceLogin(User $user)
    {
        Session::flush();
        $this->userRepository->login($user);
        return redirectSuccess(route('dashboard.index'), 'Berhasil masuk ke dalam sistem');
    }

    /**
     * block specific user
     *
     * @param Request $request
     * @param User $user
     * @return Response
     */
    public function block(Request $request, User $user)
    {
        $request->validate([
            'blocked_reason' => 'required|string|max:255',
        ]);
        $after = $this->userRepository->update([
            'is_active'          => false,
            'blocked_reason'     => $request->blocked_reason,
            'last_updated_by_id' => auth_id()
        ], $user->id);
        logExecute('Blokir Pengguna', UPDATE, $user, $after);
        return backSuccess('Pengguna ' . $user->email . ' berhasil diblokir');
    }

    /**
     * unblock specific user
     *
     * @param User $user
     * @return Response
     */
    public function unblock(User $user)
    {
        $after = $this->userRepository->update([
            'is_active'          => true,
            'blocked_reason'     => null,
            'last_updated_by_id' => auth_id()
        ], $user->id);
        logExecute('Buka Blokir Pengguna', UPDATE, $user, $after);
        return backSuccess('Pengguna ' . $user->email . ' berhasil diaktifkan kembali');
    }

    /**
     * download import example
     *
     * @return BinaryFileResponse
     */
    public function importExcelExample(): BinaryFileResponse
    {
        $filepath = public_path('excel_examples/sample_users.xlsx');
        return response()->download($filepath);
    }

    /**
     * download import example
     *
     * @return Response
     */
    public function importExcelExample2()
    {
        // $suffix = 'pengguna';
        // if (request('filter_role') && is_app_dataku()) {
        //     $suffix = Str::snake($this->role->name);
        // }
        // $this->excelFileName = 'contoh_import_' . $suffix . '.xlsx';
        // return $this->excel();
        if (is_app_dataku()) {
            if ($this->role->name === 'siswa') {
                $filepath = public_path('excel_examples/users/contoh_import_siswa.xlsx');
                $fileurl = url('excel_examples/users/contoh_import_siswa.xlsx');
            } else if ($this->role->name === 'guru') {
                $filepath = public_path('excel_examples/users/contoh_import_guru.xlsx');
                $fileurl = url('excel_examples/users/contoh_import_guru.xlsx');
            } else if ($this->role->name === 'kepala sekolah') {
                $filepath = public_path('excel_examples/users/contoh_import_kepala_sekolah.xlsx');
                $fileurl = url('excel_examples/users/contoh_import_kepala_sekolah.xlsx');
            } else if ($this->role->name === 'superadmin') {
                $filepath = public_path('excel_examples/users/contoh_import_superadmin.xlsx');
                $fileurl = url('excel_examples/users/contoh_import_superadmin.xlsx');
            }
        } else {
            $filepath = public_path('excel_examples/sample_users.xlsx');
            $fileurl = url('excel_examples/sample_users.xlsx');
        }

        // return redirect()->away($fileurl);

        return response()->download($filepath, basename($filepath), [
            // 'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        ]);
        return response()->download($filepath);
    }

    /**
     * import excel file to db
     *
     * @param ImportExcelRequest $request
     * @return RedirectResponse
     */
    public function importExcel(ImportExcelRequest $request): RedirectResponse
    {
        $this->fileService->importExcel(new UserImport, $request->file('import_file'));
        $successMessage = successMessageImportExcel("Pengguna");
        return backSuccess($successMessage);
    }
}
