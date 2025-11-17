<?php

namespace App\Repositories;

use App\Models\ActivityLog;
use App\Models\Bank;
use App\Models\BankDeposit;
use App\Models\BankDepositHistory;
use App\Models\ChatMessage;
use App\Models\CrudExample;
use App\Models\Faculty;
use App\Models\LogRequest;
use App\Models\Menu;
use App\Models\MenuGroup;
use App\Models\Notification;
use App\Models\PermissionGroup;
use App\Models\User;
use App\Services\DatabaseService;
use Spatie\Permission\Models\Permission;
use App\Models\Role;
use App\Models\Student;
use App\Models\StudyProgram;
use Illuminate\Support\Facades\Schema;

class DashboardRepository
{
    public function getWidgets()
    {
        $widgets = [];
        $user = auth_user();

        if (can('Curhat'))
            $widgets[] = (object)[
                'title' => 'Chat',
                'count' => ChatMessage::count(),
                'bg'    => 'success',
                'icon'  => 'message',
                'route' => route('chatting-yuk', ['curhat']),
            ];
        if (can('Contoh CRUD'))
            $widgets[] = (object)[
                'title' => 'Contoh CRUD',
                'count' => CrudExample::count(),
                'bg'    => 'primary',
                'icon'  => 'atom',
                'route' => route('crud-examples.index'),
            ];
        if (can('Bank') && Schema::hasTable('banks'))
            $widgets[] = (object)[
                'title' => 'Bank',
                'count' => Bank::count(),
                'bg'    => 'primary',
                'icon'  => 'university',
                'route' => route('banks.index'),
                'bg_color' => 'lightblue'
            ];
        if (can('Deposito Bank') && Schema::hasTable('bank_deposits'))
            $widgets[] = (object)[
                'title' => 'Deposito Bank',
                'count' => BankDeposit::count(),
                'bg'    => 'primary',
                'icon'  => 'dollar',
                'route' => route('bank-deposits.index'),
                'bg_color' => 'lightgreen'
            ];
        if (can('Riwayat Deposito Bank') && Schema::hasTable('bank_deposit_histories'))
            $widgets[] = (object)[
                'title' => 'Riwayat Deposito Bank',
                'count' => BankDepositHistory::count(),
                'bg'    => 'primary',
                'icon'  => 'dollar',
                'route' => route('bank-deposit-histories.index'),
                'bg_color' => 'cyan'
            ];
        if (can('Riwayat Deposito Bank') && Schema::hasTable('bank_deposit_histories'))
            $widgets[] = (object)[
                'title' => 'Keuntungan Deposito',
                'count' => rp(BankDepositHistory::sum('realization')),
                'bg'    => 'primary',
                'icon'  => 'dollar',
                'route' => route('bank-deposit-histories.index'),
                'bg_color' => '#8b743f'
            ];
        if (can('Mahasiswa') && !is_mahasiswa() && Schema::hasTable('students'))
            $widgets[] = (object)[
                'title' => 'Mahasiswa',
                'count' => is_pimpinan_fakultas() ? Student::query()->whereHas('studyProgram.faculty', function ($q) {
                    $q->where('id', auth_user()->facultyLeader->faculty->id);
                })->count() : Student::count(),
                'bg'    => 'primary',
                'icon'  => 'users',
                'route' => route('students.index'),
                'bg_color' => '#3f6e8bff'
            ];
        if (can('Alumni') && !is_mahasiswa() && Schema::hasTable('students'))
            $widgets[] = (object)[
                'title' => 'Alumni',
                'count' => is_pimpinan_fakultas() ? Student::query()->whereHas('studyProgram.faculty', function ($q) {
                    $q->where('id', auth_user()->facultyLeader->faculty->id);
                })
                    ->where('student_status', 'lulus')
                    ->count() : Student::where('student_status', 'lulus')->count(),
                'bg'    => 'primary',
                'icon'  => 'users',
                'route' => route('alumnis.index'),
                'bg_color' => '#3f8b8bff'
            ];
        if (can('Program Studi') && Schema::hasTable('study_programs'))
            $widgets[] = (object)[
                'title' => 'Program Studi',
                'count' => StudyProgram::count(),
                'bg'    => 'primary',
                'icon'  => 'book',
                'route' => route('study-programs.index'),
                'bg_color' => '#3f8b44ff'
            ];
        if (can('Fakultas') && Schema::hasTable('faculties'))
            $widgets[] = (object)[
                'title' => 'Fakultas',
                'count' => Faculty::count(),
                'bg'    => 'primary',
                'icon'  => 'university',
                'route' => route('faculties.index'),
                'bg_color' => '#8b3f64ff'
            ];
        if (can('Pengguna')) {
            $widgets[] = (object)[
                'title' => 'Pengguna',
                'count' => is_app_chat() ? User::role('user')->count() : User::count(),
                'bg'    => 'danger',
                'icon'  => 'users',
                'route' => route('user-management.users.index'),
            ];
            if ($exists = Role::where('name', 'siswa')->exists())
                $widgets[] = (object)[
                    'title' => 'Siswa',
                    'count' => User::role('siswa')->count(),
                    'bg'    => 'info',
                    'icon'  => 'users',
                    'route' => route('user-management.users.index', ['filter_role' => 4]),
                ];
            if ($exists = Role::where('name', 'guru')->exists())
                $widgets[] = (object)[
                    'title' => 'Guru',
                    'count' => User::role('guru')->count(),
                    'bg'    => 'success',
                    'icon'  => 'chalkboard-teacher',
                    'route' => route('user-management.users.index', ['filter_role' => 3]),
                ];
            if ($exists = Role::where('name', 'kepala sekolah')->exists())
                $widgets[] = (object)[
                    'title' => 'Kepala Sekolah',
                    'count' => User::role('kepala sekolah')->count(),
                    'bg'    => 'primary',
                    'icon'  => 'user-tie',
                    'route' => route('user-management.users.index', ['filter_role' => 2]),
                ];
            if ($exists = Role::where('name', 'user')->exists())
                $widgets[] = (object)[
                    'title' => User::GENDER_MALE,
                    'count' => User::isMale()->role('user')->count(),
                    'bg'    => 'info',
                    'icon'  => 'mars',
                    'route' => route('user-management.users.index', ['gender' => User::GENDER_MALE]),
                ];
            if ($exists)
                $widgets[] = (object)[
                    'title' => User::GENDER_FEMALE,
                    'count' => User::isFemale()->role('user')->count(),
                    'bg'    => 'primary',
                    'icon'  => 'venus',
                    'route' => route('user-management.users.index', ['gender' => User::GENDER_FEMALE]),
                ];
            if (is_app_chat()) {
                if ($exists)
                    $widgets[] = (object)[
                        'title' => 'Usia 10-18 Tahun',
                        'count' => User::age1018()->role('user')->count(),
                        'bg'    => 'warning',
                        'icon'  => 'users',
                        'route' => route('user-management.users.index'),
                    ];
                if ($exists)
                    $widgets[] = (object)[
                        'title' => 'Usia 19-25 Tahun',
                        'count' => User::age1925()->role('user')->count(),
                        'bg'    => 'warning',
                        'icon'  => 'users',
                        'route' => route('user-management.users.index'),
                    ];
                if ($exists)
                    $widgets[] = (object)[
                        'title' => 'Usia 26-50 Tahun',
                        'count' => User::age2650()->role('user')->count(),
                        'bg'    => 'warning',
                        'icon'  => 'users',
                        'route' => route('user-management.users.index'),
                    ];
                if ($exists)
                    $widgets[] = (object)[
                        'title' => 'Usia > 51 Tahun',
                        'count' => User::age511000()->role('user')->count(),
                        'bg'    => 'warning',
                        'icon'  => 'users',
                        'route' => route('user-management.users.index'),
                    ];
                if ($exists)
                    $widgets[] = (object)[
                        'title' => 'Orang Majalengka',
                        'count' => User::where('is_majalengka', 1)->role('user')->count(),
                        'bg'    => 'danger',
                        'icon'  => 'users',
                        'route' => route('user-management.users.index'),
                    ];
                if ($exists)
                    $widgets[] = (object)[
                        'title' => 'Orang Bukan Majalengka',
                        'count' => User::where('is_majalengka', 0)->role('user')->count(),
                        'bg'    => 'danger',
                        'icon'  => 'users',
                        'route' => route('user-management.users.index'),
                    ];
            }
        }
        if (can('Role'))
            $widgets[] = (object)[
                'title' => 'Role',
                'count' => Role::count(),
                'bg'    => 'success',
                'icon'  => 'lock',
                'route' => route('user-management.roles.index')
            ];
        if (can('Permission'))
            $widgets[] = (object)[
                'title' => 'Permission',
                'count' => Permission::count(),
                'bg'    => 'info',
                'icon'  => 'key',
                'route' => route('user-management.permissions.index')
            ];
        if (can('Group Permission'))
            $widgets[] = (object)[
                'title' => 'Group Permission',
                'count' => PermissionGroup::count(),
                'bg'    => 'info',
                'icon'  => 'key',
                'route' => route('user-management.permission-groups.index'),
                'bg_color' => 'brown'
            ];
        if (can('Menu'))
            $widgets[] = (object)[
                'title' => 'Menu',
                'count' => Menu::count(),
                'bg'    => 'primary',
                'icon'  => 'bars',
                'route' => route('menu-managements.index'),
                'bg_color' => 'pink'
            ];
        if (can('Grup Menu'))
            $widgets[] = (object)[
                'title' => 'Grup Menu',
                'count' => MenuGroup::count(),
                'bg'    => 'danger',
                'icon'  => 'bars',
                'route' => route('menu-managements.index'),
                'bg_color' => 'orange'
            ];
        if (can('Notifikasi') && Schema::hasTable('notifications')) {
            $widgets[] = (object)[
                'title' => 'Notifikasi',
                'count' => Notification::where('user_id', $user->id)->count(),
                'bg'    => 'info',
                'icon'  => 'bell',
                'route' => route('notifications.index'),
                'bg_color' => 'navy'
            ];
        }
        if (can('Log Aktivitas'))
            $widgets[] = (object)[
                'title' => 'Log Aktivitas',
                'count' => ActivityLog::count(),
                'bg'    => 'success',
                'icon'  => 'clock-rotate-left',
                'route' => route('activity-logs.index'),
                'bg_color' => 'black'
            ];
        if (can('Log Request'))
            $widgets[] = (object)[
                'title' => 'Log Request',
                'count' => LogRequest::count(),
                'bg'    => 'success',
                'icon'  => 'clock-rotate-left',
                'route' => route('request-logs.index'),
                'bg_color' => '#C88A65',
            ];
        if (can('Pengaturan'))
            $widgets[] = (object)[
                'title' => 'Pengaturan',
                'count' => '6',
                'bg'    => 'success',
                'icon'  => 'cogs',
                'route' => route('settings.all'),
                'bg_color' => '#E9D66B',
            ];
        if (can('Backup Database')) {
            $widgets[] = (object)[
                'title' => 'Backup Database',
                'count' => count((new DatabaseService)->getAllBackupMysql()),
                'bg'    => 'primary',
                'icon'  => 'database',
                'route' => route('backup-databases.index'),
                'bg_color' => 'purple',
            ];
        }

        return $widgets;
    }
}
