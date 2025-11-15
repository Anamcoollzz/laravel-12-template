<?php

use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\BackupDatabaseController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\BankDepositController;
use App\Http\Controllers\BankDepositHistoryController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\CrudExampleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DropboxController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\GroupMenuController;
use App\Http\Controllers\LogViewerController;
use App\Http\Controllers\MenuManagementController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PermissionGroupController;
// use App\Http\Controllers\PersonController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RequestLogController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudyProgramController;
use App\Http\Controllers\TestingController;
use App\Http\Controllers\UbuntuController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\YoutubeController;
use App\Http\Middleware\FileManagerPermission;
use Illuminate\Support\Facades\Route;

# DASHBOARD
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
Route::post('dashboard', [DashboardController::class, 'post']);

# SETTINGS
Route::get('settings/all', [SettingController::class, 'allSetting'])->name('settings.all');
Route::get('settings/{type}', [SettingController::class, 'index'])->name('settings.index');
Route::put('settings', [SettingController::class, 'update'])->name('settings.update');

# PROFILE
Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');
Route::put('profile', [ProfileController::class, 'update']);
Route::put('profile/password', [ProfileController::class, 'updatePassword'])->name('profile.update-password');
Route::put('profile/email', [ProfileController::class, 'updateEmail'])->name('profile.update-email');
Route::put('profile/delete-account', [ProfileController::class, 'deleteAccount'])->name('profile.delete-account');

# EXAMPLE STISLA
Route::view('datatable', 'stisla.examples.datatable.index')->name('datatable.index');
Route::view('form', 'stisla.examples.form.index')->name('form.index');
Route::view('chart-js', 'stisla.examples.chart-js.index')->name('chart-js.index');
Route::view('pricing', 'stisla.examples.pricing.index')->name('pricing.index');
Route::view('invoice', 'stisla.examples.invoice.index')->name('invoice.index');
Route::view('topnav', 'stisla.examples.topnav.index')->name('topnav.index');

# PENDUDUK
// Route::resource('persons', PersonController::class);

# USER MANAGEMENT
Route::prefix('user-management')->as('user-management.')->group(function () {
    Route::post('users/block/{user}', [UserManagementController::class, 'block'])->name('users.block');
    Route::post('users/unblock/{user}', [UserManagementController::class, 'unblock'])->name('users.unblock');
    Route::get('users/force-login/{user}', [UserManagementController::class, 'forceLogin'])->name('users.force-login');
    Route::get('users/pdf', [UserManagementController::class, 'pdf'])->name('users.pdf');
    Route::get('users/csv', [UserManagementController::class, 'csv'])->name('users.csv');
    Route::get('users/excel', [UserManagementController::class, 'excel'])->name('users.excel');
    Route::get('users/json', [UserManagementController::class, 'json'])->name('users.json');
    Route::get('users/import-excel-example', [UserManagementController::class, 'importExcelExample'])->name('users.import-excel-example');
    Route::post('users/import-excel', [UserManagementController::class, 'importExcel'])->name('users.import-excel');
    Route::resource('users', UserManagementController::class);

    # ROLES
    Route::get('roles/pdf', [RoleController::class, 'pdf'])->name('roles.pdf');
    Route::get('roles/csv', [RoleController::class, 'csv'])->name('roles.csv');
    Route::get('roles/excel', [RoleController::class, 'excel'])->name('roles.excel');
    Route::get('roles/json', [RoleController::class, 'json'])->name('roles.json');
    Route::get('roles/import-excel-example', [RoleController::class, 'importExcelExample'])->name('roles.import-excel-example');
    Route::post('roles/import-excel', [RoleController::class, 'importExcel'])->name('roles.import-excel');
    Route::resource('roles', RoleController::class);

    # PERMISSIONS
    Route::get('permissions/pdf', [PermissionController::class, 'pdf'])->name('permissions.pdf');
    Route::get('permissions/csv', [PermissionController::class, 'csv'])->name('permissions.csv');
    Route::get('permissions/excel', [PermissionController::class, 'excel'])->name('permissions.excel');
    Route::get('permissions/json', [PermissionController::class, 'json'])->name('permissions.json');
    Route::get('permissions/import-excel-example', [PermissionController::class, 'importExcelExample'])->name('permissions.import-excel-example');
    Route::post('permissions/import-excel', [PermissionController::class, 'importExcel'])->name('permissions.import-excel');
    Route::resource('permissions', PermissionController::class);

    # GROUP PERMISSIONS
    Route::get('permission-groups/pdf', [PermissionGroupController::class, 'pdf'])->name('permission-groups.pdf');
    Route::get('permission-groups/csv', [PermissionGroupController::class, 'csv'])->name('permission-groups.csv');
    Route::get('permission-groups/excel', [PermissionGroupController::class, 'excel'])->name('permission-groups.excel');
    Route::get('permission-groups/json', [PermissionGroupController::class, 'json'])->name('permission-groups.json');
    Route::get('permission-groups/import-excel-example', [PermissionGroupController::class, 'importExcelExample'])->name('permission-groups.import-excel-example');
    Route::post('permission-groups/import-excel', [PermissionGroupController::class, 'importExcel'])->name('permission-groups.import-excel');
    Route::get('permission-groups/import-excel-example', [PermissionGroupController::class, 'importExcelExample'])->name('permission-groups.import-excel-example');
    Route::post('permission-groups/import-excel', [PermissionGroupController::class, 'importExcel'])->name('permission-groups.import-excel');
    Route::resource('permission-groups', PermissionGroupController::class);
});

# ACTIVITY LOGS
Route::get('activity-logs', [ActivityLogController::class, 'index'])->name('activity-logs.index');
Route::get('activity-logs/print', [ActivityLogController::class, 'exportPrint'])->name('activity-logs.print');
Route::get('activity-logs/pdf', [ActivityLogController::class, 'pdf'])->name('activity-logs.pdf');
Route::get('activity-logs/csv', [ActivityLogController::class, 'csv'])->name('activity-logs.csv');
Route::get('activity-logs/json', [ActivityLogController::class, 'json'])->name('activity-logs.json');
Route::get('activity-logs/excel', [ActivityLogController::class, 'excel'])->name('activity-logs.excel');

# REQUEST LOGS
Route::get('request-logs', [RequestLogController::class, 'index'])->name('request-logs.index');
Route::get('request-logs/print', [RequestLogController::class, 'exportPrint'])->name('request-logs.print');
Route::get('request-logs/pdf', [RequestLogController::class, 'pdf'])->name('request-logs.pdf');
Route::get('request-logs/csv', [RequestLogController::class, 'csv'])->name('request-logs.csv');
Route::get('request-logs/json', [RequestLogController::class, 'json'])->name('request-logs.json');
Route::get('request-logs/excel', [RequestLogController::class, 'excel'])->name('request-logs.excel');

# NOTIFICATIONS
Route::get('notifications/read-all', [NotificationController::class, 'readAll'])->name('notifications.read-all');
Route::get('notifications/read/{notification}', [NotificationController::class, 'read'])->name('notifications.read');
Route::get('notifications', [NotificationController::class, 'index'])->name('notifications.index');

# BACKUP DATABASE
Route::resource('backup-databases', BackupDatabaseController::class);

# FILE MANAGER
Route::group(['prefix' => 'unisharp-files', 'middleware' => [FileManagerPermission::class]], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

# LOG VIEWER
Route::get('logs-viewer', [LogViewerController::class, 'index'])->name('logs.index')->middleware('can:Laravel Log Viewer');

# YOUTUBE VIEWER (SECRET MENU)
Route::get('youtube-viewer', [YoutubeController::class, 'viewer'])->name('youtube.viewer');
Route::get('youtube-viewer-per-video', [YoutubeController::class, 'viewerPerVideo'])->name('youtube.viewer-per-video');

# UBUNTU
Route::get('ubuntu/laravel-seeder/{seeder}', [UbuntuController::class, 'laravelSeeder'])->name('ubuntu.laravelSeeder');
Route::get('ubuntu/laravel-migrate', [UbuntuController::class, 'laravelMigrate'])->name('ubuntu.laravelMigrate');
Route::get('ubuntu/laravel-migrate-refresh', [UbuntuController::class, 'laravelMigrateRefresh'])->name('ubuntu.laravelMigrateRefresh');
Route::get('ubuntu/supervisor/{action}', [UbuntuController::class, 'supervisor'])->name('ubuntu.supervisor');
Route::get('ubuntu/php-fpm/{version}/{action}', [UbuntuController::class, 'phpFpm'])->name('ubuntu.php-fpm');
Route::get('ubuntu/mysql/{action}', [UbuntuController::class, 'mysql'])->name('ubuntu.mysql');
Route::get('ubuntu/mysql/{database?}/{table?}/{action?}', [UbuntuController::class, 'index'])->name('ubuntu.mysql-paginate');
Route::get('ubuntu/edit-row/{database}/{table}/{id}', [UbuntuController::class, 'editRow'])->name('ubuntu.edit-row');
Route::put('ubuntu/update-row/{database}/{table}/{id}', [UbuntuController::class, 'updateRow'])->name('ubuntu.update-row');
Route::delete('ubuntu/delete-row/{database}/{table}/{id}', [UbuntuController::class, 'deleteRow'])->name('ubuntu.delete-row');
Route::get('ubuntu/nginx', [UbuntuController::class, 'nginx'])->name('ubuntu.nginx');
Route::post('ubuntu/create-database', [UbuntuController::class, 'createDb'])->name('ubuntu.create-db');
Route::get('ubuntu/{pathname}/toggle-ssl/{nextStatus}', [UbuntuController::class, 'toggleSSL'])->name('ubuntu.toggle-ssl');
Route::get('ubuntu/{pathname}/toggle-enabled/{nextStatus}', [UbuntuController::class, 'toggleEnabled'])->name('ubuntu.toggle-enabled');
Route::get('ubuntu/{pathname}/duplicate', [UbuntuController::class, 'duplicate'])->name('ubuntu.duplicate');
Route::get('ubuntu/{pathname}/git-pull', [UbuntuController::class, 'gitPull'])->name('ubuntu.git-pull');
Route::get('ubuntu/{pathname}/set-laravel-permission', [UbuntuController::class, 'setLaravelPermission'])->name('ubuntu.set-laravel-permission');
Route::get('mysql-all', [UbuntuController::class, 'index'])->name('ubuntu.mysql-all');
Route::resource('ubuntu', UbuntuController::class);

# MANAJEMEN MENU
Route::get('menu-managements/pdf', [MenuManagementController::class, 'pdf'])->name('menu-managements.pdf');
Route::get('menu-managements/csv', [MenuManagementController::class, 'csv'])->name('menu-managements.csv');
Route::get('menu-managements/excel', [MenuManagementController::class, 'excel'])->name('menu-managements.excel');
Route::get('menu-managements/json', [MenuManagementController::class, 'json'])->name('menu-managements.json');
Route::get('menu-managements/import-excel-example', [MenuManagementController::class, 'importExcelExample'])->name('menu-managements.import-excel-example');
Route::post('menu-managements/import-excel', [MenuManagementController::class, 'importExcel'])->name('menu-managements.import-excel');
Route::get('menu-managements/import-excel-example', [MenuManagementController::class, 'importExcelExample'])->name('menu-managements.import-excel-example');
Route::post('menu-managements/import-excel', [MenuManagementController::class, 'importExcel'])->name('menu-managements.import-excel');
Route::resource('menu-managements', MenuManagementController::class);

Route::resource('group-menus', GroupMenuController::class);

# CONTOH CRUD
Route::get('yajra-crud-examples', [CrudExampleController::class, 'index'])->name('crud-examples.index-yajra');
Route::get('yajra-crud-examples/ajax', [CrudExampleController::class, 'yajraAjax'])->name('crud-examples.ajax-yajra');
Route::get('ajax-crud-examples', [CrudExampleController::class, 'index'])->name('crud-examples.index-ajax');
Route::get('yajra-ajax-crud-examples', [CrudExampleController::class, 'index'])->name('crud-examples.index-ajax-yajra');
Route::get('crud-examples/pdf', [CrudExampleController::class, 'exportPdf'])->name('crud-examples.pdf');
Route::get('crud-examples/csv', [CrudExampleController::class, 'exportCsv'])->name('crud-examples.csv');
Route::get('crud-examples/excel', [CrudExampleController::class, 'exportExcel'])->name('crud-examples.excel');
Route::get('crud-examples/json', [CrudExampleController::class, 'exportJson'])->name('crud-examples.json');
Route::get('crud-examples/import-excel-example', [CrudExampleController::class, 'importExcelExample'])->name('crud-examples.import-excel-example');
Route::post('crud-examples/import-excel', [CrudExampleController::class, 'importExcel'])->name('crud-examples.import-excel');
Route::post('crud-examples/duplicate/{crudExample}', [CrudExampleController::class, 'duplicate'])->name('crud-examples.duplicate');
Route::put('crud-examples/restore/{crudExample}', [CrudExampleController::class, 'restore'])->name('crud-examples.restore');
Route::delete('crud-examples/force-delete/{crud_example}', [CrudExampleController::class, 'forceDelete'])->name('crud-examples.force-delete');
Route::resource('crud-examples', CrudExampleController::class);

# BANK
Route::get('yajra-banks', [BankController::class, 'index'])->name('banks.index-yajra');
Route::get('yajra-banks/ajax', [BankController::class, 'yajraAjax'])->name('banks.ajax-yajra');
Route::get('ajax-banks', [BankController::class, 'index'])->name('banks.index-ajax');
Route::get('yajra-ajax-banks', [BankController::class, 'index'])->name('banks.index-ajax-yajra');
Route::get('banks/pdf', [BankController::class, 'exportPdf'])->name('banks.pdf');
Route::get('banks/csv', [BankController::class, 'exportCsv'])->name('banks.csv');
Route::get('banks/excel', [BankController::class, 'exportExcel'])->name('banks.excel');
Route::get('banks/json', [BankController::class, 'exportJson'])->name('banks.json');
Route::get('banks/import-excel-example', [BankController::class, 'importExcelExample'])->name('banks.import-excel-example');
Route::post('banks/import-excel', [BankController::class, 'importExcel'])->name('banks.import-excel');
Route::resource('banks', BankController::class);

# DEPOSITO BANK
Route::get('toggle-chart', function () {
    session(['toggle_chart' => !session('toggle_chart')]);
    return back();
})->name('toggle-chart');
Route::get('save-to-history-bank-deposits', [BankDepositController::class, 'saveToHistory'])->name('bank-deposits.save-to-history');
Route::get('yajra-bank-deposits', [BankDepositController::class, 'index'])->name('bank-deposits.index-yajra');
Route::get('yajra-bank-deposits/ajax', [BankDepositController::class, 'yajraAjax'])->name('bank-deposits.ajax-yajra');
Route::get('ajax-bank-deposits', [BankDepositController::class, 'index'])->name('bank-deposits.index-ajax');
Route::get('yajra-ajax-bank-deposits', [BankDepositController::class, 'index'])->name('bank-deposits.index-ajax-yajra');
Route::get('bank-deposits/pdf', [BankDepositController::class, 'exportPdf'])->name('bank-deposits.pdf');
Route::get('bank-deposits/csv', [BankDepositController::class, 'exportCsv'])->name('bank-deposits.csv');
Route::get('bank-deposits/excel', [BankDepositController::class, 'exportExcel'])->name('bank-deposits.excel');
Route::get('bank-deposits/json', [BankDepositController::class, 'exportJson'])->name('bank-deposits.json');
Route::get('bank-deposits/import-excel-example', [BankDepositController::class, 'importExcelExample'])->name('bank-deposits.import-excel-example');
Route::post('bank-deposits/import-excel', [BankDepositController::class, 'importExcel'])->name('bank-deposits.import-excel');
Route::resource('bank-deposits', BankDepositController::class);

# RIWAYAT DEPOSITO BANK
Route::get('yajra-bank-deposit-histories', [BankDepositHistoryController::class, 'index'])->name('bank-deposit-histories.index-yajra');
Route::get('yajra-bank-deposit-histories/ajax', [BankDepositHistoryController::class, 'yajraAjax'])->name('bank-deposit-histories.ajax-yajra');
Route::get('ajax-bank-deposit-histories', [BankDepositHistoryController::class, 'index'])->name('bank-deposit-histories.index-ajax');
Route::get('yajra-ajax-bank-deposit-histories', [BankDepositHistoryController::class, 'index'])->name('bank-deposit-histories.index-ajax-yajra');
Route::get('bank-deposit-histories/pdf', [BankDepositHistoryController::class, 'exportPdf'])->name('bank-deposit-histories.pdf');
Route::get('bank-deposit-histories/csv', [BankDepositHistoryController::class, 'exportCsv'])->name('bank-deposit-histories.csv');
Route::get('bank-deposit-histories/excel', [BankDepositHistoryController::class, 'exportExcel'])->name('bank-deposit-histories.excel');
Route::get('bank-deposit-histories/json', [BankDepositHistoryController::class, 'exportJson'])->name('bank-deposit-histories.json');
Route::get('bank-deposit-histories/import-excel-example', [BankDepositHistoryController::class, 'importExcelExample'])->name('bank-deposit-histories.import-excel-example');
Route::post('bank-deposit-histories/import-excel', [BankDepositHistoryController::class, 'importExcel'])->name('bank-deposit-histories.import-excel');
Route::resource('bank-deposit-histories', BankDepositHistoryController::class);

# MAHASISWA
Route::get('yajra-students', [StudentController::class, 'index'])->name('students.index-yajra');
Route::get('yajra-students/ajax', [StudentController::class, 'yajraAjax'])->name('students.ajax-yajra');
Route::get('ajax-students', [StudentController::class, 'index'])->name('students.index-ajax');
Route::get('yajra-ajax-students', [StudentController::class, 'index'])->name('students.index-ajax-yajra');
Route::get('students/pdf', [StudentController::class, 'exportPdf'])->name('students.pdf');
Route::get('students/csv', [StudentController::class, 'exportCsv'])->name('students.csv');
Route::get('students/excel', [StudentController::class, 'exportExcel'])->name('students.excel');
Route::get('students/json', [StudentController::class, 'exportJson'])->name('students.json');
Route::get('students/import-excel-example', [StudentController::class, 'importExcelExample'])->name('students.import-excel-example');
Route::post('students/import-excel', [StudentController::class, 'importExcel'])->name('students.import-excel');
Route::resource('students', StudentController::class);
# FAKULTAS
Route::get('yajra-faculties', [FacultyController::class, 'index'])->name('faculties.index-yajra');
Route::get('yajra-faculties/ajax', [FacultyController::class, 'yajraAjax'])->name('faculties.ajax-yajra');
Route::get('ajax-faculties', [FacultyController::class, 'index'])->name('faculties.index-ajax');
Route::get('yajra-ajax-faculties', [FacultyController::class, 'index'])->name('faculties.index-ajax-yajra');
Route::get('faculties/pdf', [FacultyController::class, 'exportPdf'])->name('faculties.pdf');
Route::get('faculties/csv', [FacultyController::class, 'exportCsv'])->name('faculties.csv');
Route::get('faculties/excel', [FacultyController::class, 'exportExcel'])->name('faculties.excel');
Route::get('faculties/json', [FacultyController::class, 'exportJson'])->name('faculties.json');
Route::get('faculties/import-excel-example', [FacultyController::class, 'importExcelExample'])->name('faculties.import-excel-example');
Route::post('faculties/import-excel', [FacultyController::class, 'importExcel'])->name('faculties.import-excel');
Route::resource('faculties', FacultyController::class);
# PROGRAM STUDI
Route::get('yajra-study-programs', [StudyProgramController::class, 'index'])->name('study-programs.index-yajra');
Route::get('yajra-study-programs/ajax', [StudyProgramController::class, 'yajraAjax'])->name('study-programs.ajax-yajra');
Route::get('ajax-study-programs', [StudyProgramController::class, 'index'])->name('study-programs.index-ajax');
Route::get('yajra-ajax-study-programs', [StudyProgramController::class, 'index'])->name('study-programs.index-ajax-yajra');
Route::get('study-programs/pdf', [StudyProgramController::class, 'exportPdf'])->name('study-programs.pdf');
Route::get('study-programs/csv', [StudyProgramController::class, 'exportCsv'])->name('study-programs.csv');
Route::get('study-programs/excel', [StudyProgramController::class, 'exportExcel'])->name('study-programs.excel');
Route::get('study-programs/json', [StudyProgramController::class, 'exportJson'])->name('study-programs.json');
Route::get('study-programs/import-excel-example', [StudyProgramController::class, 'importExcelExample'])->name('study-programs.import-excel-example');
Route::post('study-programs/import-excel', [StudyProgramController::class, 'importExcel'])->name('study-programs.import-excel');
Route::resource('study-programs', StudyProgramController::class);

# FacultyLeader
Route::get('yajra-faculty-leaders', [\App\Http\Controllers\FacultyLeaderController::class, 'index'])->name('faculty-leaders.index-yajra');
Route::get('yajra-faculty-leaders/ajax', [\App\Http\Controllers\FacultyLeaderController::class, 'yajraAjax'])->name('faculty-leaders.ajax-yajra');
Route::get('ajax-faculty-leaders', [\App\Http\Controllers\FacultyLeaderController::class, 'index'])->name('faculty-leaders.index-ajax');
Route::get('yajra-ajax-faculty-leaders', [\App\Http\Controllers\FacultyLeaderController::class, 'index'])->name('faculty-leaders.index-ajax-yajra');
Route::get('faculty-leaders/pdf', [\App\Http\Controllers\FacultyLeaderController::class, 'exportPdf'])->name('faculty-leaders.pdf');
Route::get('faculty-leaders/csv', [\App\Http\Controllers\FacultyLeaderController::class, 'exportCsv'])->name('faculty-leaders.csv');
Route::get('faculty-leaders/excel', [\App\Http\Controllers\FacultyLeaderController::class, 'exportExcel'])->name('faculty-leaders.excel');
Route::get('faculty-leaders/json', [\App\Http\Controllers\FacultyLeaderController::class, 'exportJson'])->name('faculty-leaders.json');
Route::get('faculty-leaders/import-excel-example', [\App\Http\Controllers\FacultyLeaderController::class, 'importExcelExample'])->name('faculty-leaders.import-excel-example');
Route::post('faculty-leaders/import-excel', [\App\Http\Controllers\FacultyLeaderController::class, 'importExcel'])->name('faculty-leaders.import-excel');
Route::resource('faculty-leaders', \App\Http\Controllers\FacultyLeaderController::class);

# Ormawa
Route::get('yajra-ormawas', [\App\Http\Controllers\OrmawaController::class, 'index'])->name('ormawas.index-yajra');
Route::get('yajra-ormawas/ajax', [\App\Http\Controllers\OrmawaController::class, 'yajraAjax'])->name('ormawas.ajax-yajra');
Route::get('ajax-ormawas', [\App\Http\Controllers\OrmawaController::class, 'index'])->name('ormawas.index-ajax');
Route::get('yajra-ajax-ormawas', [\App\Http\Controllers\OrmawaController::class, 'index'])->name('ormawas.index-ajax-yajra');
Route::get('ormawas/pdf', [\App\Http\Controllers\OrmawaController::class, 'exportPdf'])->name('ormawas.pdf');
Route::get('ormawas/csv', [\App\Http\Controllers\OrmawaController::class, 'exportCsv'])->name('ormawas.csv');
Route::get('ormawas/excel', [\App\Http\Controllers\OrmawaController::class, 'exportExcel'])->name('ormawas.excel');
Route::get('ormawas/json', [\App\Http\Controllers\OrmawaController::class, 'exportJson'])->name('ormawas.json');
Route::get('ormawas/import-excel-example', [\App\Http\Controllers\OrmawaController::class, 'importExcelExample'])->name('ormawas.import-excel-example');
Route::post('ormawas/import-excel', [\App\Http\Controllers\OrmawaController::class, 'importExcel'])->name('ormawas.import-excel');
Route::resource('ormawas', \App\Http\Controllers\OrmawaController::class);

# Alumni
Route::get('yajra-alumnis', [\App\Http\Controllers\AlumniController::class, 'index'])->name('alumnis.index-yajra');
Route::get('yajra-alumnis/ajax', [\App\Http\Controllers\AlumniController::class, 'yajraAjax'])->name('alumnis.ajax-yajra');
Route::get('ajax-alumnis', [\App\Http\Controllers\AlumniController::class, 'index'])->name('alumnis.index-ajax');
Route::get('yajra-ajax-alumnis', [\App\Http\Controllers\AlumniController::class, 'index'])->name('alumnis.index-ajax-yajra');
Route::get('alumnis/pdf', [\App\Http\Controllers\AlumniController::class, 'exportPdf'])->name('alumnis.pdf');
Route::get('alumnis/csv', [\App\Http\Controllers\AlumniController::class, 'exportCsv'])->name('alumnis.csv');
Route::get('alumnis/excel', [\App\Http\Controllers\AlumniController::class, 'exportExcel'])->name('alumnis.excel');
Route::get('alumnis/json', [\App\Http\Controllers\AlumniController::class, 'exportJson'])->name('alumnis.json');
Route::get('alumnis/import-excel-example', [\App\Http\Controllers\AlumniController::class, 'importExcelExample'])->name('alumnis.import-excel-example');
Route::post('alumnis/import-excel', [\App\Http\Controllers\AlumniController::class, 'importExcel'])->name('alumnis.import-excel');
Route::resource('alumnis', \App\Http\Controllers\AlumniController::class);

# Work
Route::get('yajra-works', [\App\Http\Controllers\WorkController::class, 'index'])->name('works.index-yajra');
Route::get('yajra-works/ajax', [\App\Http\Controllers\WorkController::class, 'yajraAjax'])->name('works.ajax-yajra');
Route::get('ajax-works', [\App\Http\Controllers\WorkController::class, 'index'])->name('works.index-ajax');
Route::get('yajra-ajax-works', [\App\Http\Controllers\WorkController::class, 'index'])->name('works.index-ajax-yajra');
Route::get('works/pdf', [\App\Http\Controllers\WorkController::class, 'exportPdf'])->name('works.pdf');
Route::get('works/csv', [\App\Http\Controllers\WorkController::class, 'exportCsv'])->name('works.csv');
Route::get('works/excel', [\App\Http\Controllers\WorkController::class, 'exportExcel'])->name('works.excel');
Route::get('works/json', [\App\Http\Controllers\WorkController::class, 'exportJson'])->name('works.json');
Route::get('works/import-excel-example', [\App\Http\Controllers\WorkController::class, 'importExcelExample'])->name('works.import-excel-example');
Route::post('works/import-excel', [\App\Http\Controllers\WorkController::class, 'importExcel'])->name('works.import-excel');
Route::resource('works', \App\Http\Controllers\WorkController::class);
//route

Route::get('testing/datatable', [TestingController::class, 'datatable']);
Route::get('testing/send-email', [TestingController::class, 'sendEmail']);
Route::get('testing/modal', [TestingController::class, 'modal']);

# DROPBOX
Route::get('dropboxs', [DropboxController::class, 'index'])->name('dropboxs.index');
Route::post('dropboxs', [DropboxController::class, 'upload'])->name('dropboxs.upload');
Route::delete('dropboxs', [DropboxController::class, 'destroy'])->name('dropboxs.destroy');

# RESET
Route::get('reset', [SettingController::class, 'reset'])->name('reset');
Route::get('reset2', [SettingController::class, 'reset2'])->name('reset2');

# CHATS
Route::get('yajra-chats', [ChatController::class, 'index'])->name('chats.index-yajra');
Route::get('yajra-chats/ajax', [ChatController::class, 'yajraAjax'])->name('chats.ajax-yajra');
Route::get('ajax-chats', [ChatController::class, 'index'])->name('chats.index-ajax');
Route::get('yajra-ajax-chats', [ChatController::class, 'index'])->name('chats.index-ajax-yajra');
Route::get('chats/pdf', [ChatController::class, 'exportPdf'])->name('chats.pdf');
Route::get('chats/csv', [ChatController::class, 'exportCsv'])->name('chats.csv');
Route::get('chats/excel', [ChatController::class, 'exportExcel'])->name('chats.excel');
Route::get('chats/json', [ChatController::class, 'exportJson'])->name('chats.json');
Route::get('chats/import-excel-example', [ChatController::class, 'importExcelExample'])->name('chats.import-excel-example');
Route::post('chats/import-excel', [ChatController::class, 'importExcel'])->name('chats.import-excel');
Route::get('chats/get-room-id', [ChatController::class, 'getRoomId'])->name('chats.get-room-id');
Route::get('chatting-yuk/{category}', [ChatController::class, 'index'])->name('chatting-yuk');
Route::get('chatting-yuk-delete/{category}', [ChatController::class, 'reset'])->name('chatting-yuk-delete');
Route::get('chatting-yuk-users', [ChatController::class, 'users'])->name('chatting-yuk-users');
Route::resource('chats', ChatController::class);
