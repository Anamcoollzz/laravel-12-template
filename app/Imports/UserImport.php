<?php

namespace App\Imports;

use App\Repositories\ClassLevelRepository;
use App\Repositories\RegionRepository;
use App\Repositories\ReligionRepository;
use App\Repositories\SchoolClassRepository;
use App\Repositories\UserRepository;
use App\Repositories\WorkRepository;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UserImport implements ToCollection, WithHeadingRow
{

    /**
     * user repository
     *
     * @var UserRepository
     */
    private UserRepository $userRepository;
    private ReligionRepository $religionRepository;
    private SchoolClassRepository $schoolClassRepository;
    private WorkRepository $workRepository;
    private ClassLevelRepository $classLevelRepository;
    private RegionRepository $regionRepository;

    /**
     * constructor method
     *
     * @return void
     */
    public function __construct()
    {
        $this->userRepository        = new UserRepository;
        $this->religionRepository    = new ReligionRepository;
        $this->schoolClassRepository = new SchoolClassRepository;
        $this->workRepository        = new WorkRepository;
        $this->classLevelRepository  = new ClassLevelRepository;
        $this->regionRepository      = new RegionRepository;
    }

    /**
     * To collection
     *
     * @return void
     */
    public function collection(Collection $rows)
    {
        DB::beginTransaction();
        $isSiswa = request('filter_role') === '4';
        $errorMsg = '';
        if (!($rows->first()['password'] ?? false) && request('filter_role') != '4') {
            $errorMsg = 'Kolom Password Tidak Ditemukan';
            DB::rollBack();
            return backError($errorMsg);
        }
        if (!$isSiswa) {
            $emailList = $rows->pluck('email')->toArray();
            $total = $this->userRepository->countWhereIn('email', $emailList);
            if ($total > 0) {
                $errorMsg = 'Terdapat ' . $total . ' email yang sudah terdaftar di sistem.';
                DB::rollBack();
                return backError($errorMsg);
            }
        }
        $dateTime      = date('Y-m-d H:i:s');
        $religions     = $this->religionRepository->getSelectOptions('id', 'religion_name');
        $works         = $this->workRepository->getSelectOptions('id', 'job_name');
        $classLevels   = $this->classLevelRepository->getSelectOptions('id', 'level_name');
        $schoolClasses = $this->schoolClassRepository->getSelectOptions('id', 'class_name');
        $regions       = $this->regionRepository->getSelectOptions('code', 'name', whereField: 'name', whereIn: $rows->pluck('provinsi')->merge($rows->pluck('kotakabupaten'))->merge($rows->pluck('kecamatan'))->merge($rows->pluck('desakelurahan'))->unique()->toArray());

        foreach ($rows->chunk(30) as $chunkData) {
            $insertData = $chunkData->map(function ($item) use ($dateTime, $errorMsg, $religions, $works, $schoolClasses, $classLevels, $regions, $isSiswa) {
                // dd($item, $regions[$item['desakelurahan']]);
                $birthDate = null;
                if (is_numeric($item['tanggal_lahir'])) {
                    $date = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($item['tanggal_lahir']);
                    $birthDate = $date->format('Y-m-d');
                } else {
                    $birthDate = date('Y-m-d', strtotime($item['tanggal_lahir']));
                }


                $isGuru = request('filter_role') === '3';

                $data = [
                    'name'                    => $item['nama'],
                    'email'                   => $item['email'] ?? null,
                    'password'                => $isSiswa ? 'test' : bcrypt($item['password']),
                    'phone_number'            => $item['no_hp'],
                    'birth_date'              => $birthDate,
                    'address'                 => $item['alamat'],
                    'created_at'              => $dateTime,
                    'updated_at'              => $dateTime,
                    'created_by_id'           => auth_user()->id,
                    'nik'                     => $item['nik'],
                    'gender'                  => $item['jenis_kelamin'],
                    'education_level_id'      => session('education_level_id') ?? null,
                    'is_active'               => $item['status'] === 'Aktif',

                    // 'avatar',
                    // 'email_verified_at',
                    // 'last_login',
                    // 'email_token',
                    // 'verification_code',
                    // 'is_locked',
                    // 'last_password_change',
                    // 'twitter_id',
                ];

                if ($isSiswa) {
                    return array_merge($data, [
                        // student specific
                        'nis'                 => $item['nis'],
                        'nisn'                => $item['nisn'],
                        'religion_id'         => $religions[$item['agama']] ?? null,
                        'rt'                  => $item['rt'],
                        'rw'                  => $item['rw'],
                        'postal_code'         => $item['kode_pos'],
                        'school_class_id'     => $schoolClasses[$item['kelas']] ?? null,
                        'room'                => $item['ruang'],
                        'father_nik'          => $item['nik_ayah'],
                        'father_name'         => $item['nama_ayah'],
                        'father_birth_date'   => $item['tanggal_lahir_ayah'],
                        'father_education'    => $item['pendidikan_ayah'],
                        'father_work_id'      => $works[$item['pekerjaan_ayah']] ?? null,
                        'father_income'       => rp_to_double($item['penghasilan_ayah']),
                        'mother_nik'          => $item['nik_ibu'],
                        'mother_name'         => $item['nama_ibu'],
                        'mother_birth_date'   => $item['tanggal_lahir_ibu'],
                        'mother_education'    => $item['pendidikan_ibu'],
                        'mother_work_id'      => $works[$item['pekerjaan_ibu']] ?? null,
                        'mother_income'       => rp_to_double($item['penghasilan_ibu']),
                        'guardian_nik'        => $item['nik_wali'],
                        'guardian_name'       => $item['nama_wali'],
                        'guardian_birth_date' => $item['tanggal_lahir_wali'],
                        'guardian_education'  => $item['pendidikan_wali'],
                        'guardian_work_id'    => $works[$item['pekerjaan_wali']] ?? null,
                        'guardian_income'     => rp_to_double($item['penghasilan_wali']),
                        'class_level_id'      => $classLevels[$item['level_kelas']] ?? null,
                        'province_code'       => $regions[$item['provinsi']] ?? null,
                        'city_code'           => $regions[$item['kotakabupaten']] ?? null,
                        'district_code'       => $regions[$item['kecamatan']] ?? null,
                        'village_code'        => $regions[$item['desakelurahan']] ?? null,
                    ]);
                } else if ($isGuru) {
                    return array_merge($data, [
                        // teacher specific
                        'teacher_nuptk'           => $item['nuptk'],
                        'teacher_mother_name'     => $item['nama_ibu_kandung'],
                        'teacher_employee_status' => $item['status_pegawai'],
                        'teacher_gtk_type'        => $item['tipe_gtk'],
                        'teacher_position'        => $item['jabatan'],
                    ]);
                }

                return $data;
            })->toArray();
            $this->userRepository->insert($insertData);
        }

        // if ($errorMsg) {
        //     DB::rollBack();
        //     return backError($errorMsg);
        // }

        foreach ($rows->chunk(30) as $chunkData) {
            $insertData = $chunkData->map(function ($item) {
                if (is_numeric($item['role'])) {
                    $roles = $this->userRepository->getRoles();
                } else if (is_string($item['role'])) {
                    $roles = explode(',', $item['role']);
                    $roles = $this->userRepository->getRoles($roles);
                } else {
                    $roles = [];
                }
                if (isset($item['email'])) {
                    $user  = $this->userRepository->findByEmail($item['email']);
                    $this->userRepository->syncRoles($user, $roles);
                } else {
                    $user  = $this->userRepository->findBy('nik', $item['nik']);
                    $this->userRepository->syncRoles($user, $roles);
                }
            });
        }
        DB::commit();
    }
}
