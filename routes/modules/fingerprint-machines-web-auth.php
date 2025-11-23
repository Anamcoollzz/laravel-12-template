
<?php

use Illuminate\Support\Facades\Route;

# Mesin Sidik Jari Module Routes
Route::get('yajra-fingerprint-machines', [\App\Http\Controllers\FingerprintMachineController::class, 'index'])->name('fingerprint-machines.index-yajra');
Route::get('yajra-fingerprint-machines/ajax', [\App\Http\Controllers\FingerprintMachineController::class, 'yajraAjax'])->name('fingerprint-machines.ajax-yajra');
Route::get('ajax-fingerprint-machines', [\App\Http\Controllers\FingerprintMachineController::class, 'index'])->name('fingerprint-machines.index-ajax');
Route::get('yajra-ajax-fingerprint-machines', [\App\Http\Controllers\FingerprintMachineController::class, 'index'])->name('fingerprint-machines.index-ajax-yajra');
Route::get('fingerprint-machines/pdf', [\App\Http\Controllers\FingerprintMachineController::class, 'exportPdf'])->name('fingerprint-machines.pdf');
Route::get('fingerprint-machines/csv', [\App\Http\Controllers\FingerprintMachineController::class, 'exportCsv'])->name('fingerprint-machines.csv');
Route::get('fingerprint-machines/excel', [\App\Http\Controllers\FingerprintMachineController::class, 'exportExcel'])->name('fingerprint-machines.excel');
Route::get('fingerprint-machines/json', [\App\Http\Controllers\FingerprintMachineController::class, 'exportJson'])->name('fingerprint-machines.json');
Route::get('fingerprint-machines/import-excel-example', [\App\Http\Controllers\FingerprintMachineController::class, 'importExcelExample'])->name('fingerprint-machines.import-excel-example');
Route::post('fingerprint-machines/import-excel', [\App\Http\Controllers\FingerprintMachineController::class, 'importExcel'])->name('fingerprint-machines.import-excel');
Route::post('fingerprint-machines/duplicate/{fingerprint_machine}', [\App\Http\Controllers\FingerprintMachineController::class, 'duplicate'])->name('fingerprint-machines.duplicate');
Route::put('fingerprint-machines/restore/{fingerprint_machine}', [\App\Http\Controllers\FingerprintMachineController::class, 'restore'])->name('fingerprint-machines.restore');
Route::put('fingerprint-machines/restore-all', [\App\Http\Controllers\FingerprintMachineController::class, 'restoreAll'])->name('fingerprint-machines.restore-all');
Route::delete('fingerprint-machines/force-delete/{fingerprint_machine}', [\App\Http\Controllers\FingerprintMachineController::class, 'forceDelete'])->name('fingerprint-machines.force-delete');
Route::delete('fingerprint-machines/force-delete-all', [\App\Http\Controllers\FingerprintMachineController::class, 'forceDeleteAll'])->name('fingerprint-machines.force-delete-all');
Route::get('fingerprint-machines', [\App\Http\Controllers\FingerprintMachineController::class, 'indexData'])->name('fingerprint-machines.index');
Route::get('fingerprint-machines/create', [\App\Http\Controllers\FingerprintMachineController::class, 'createData'])->name('fingerprint-machines.create');
Route::post('fingerprint-machines', [\App\Http\Controllers\FingerprintMachineController::class, 'storeData'])->name('fingerprint-machines.store');
Route::get('fingerprint-machines/{fingerprint_machine}', [\App\Http\Controllers\FingerprintMachineController::class, 'showData'])->name('fingerprint-machines.show');
Route::get('fingerprint-machines-single-pdf/{fingerprint_machine}', [\App\Http\Controllers\FingerprintMachineController::class, 'singlePdf'])->name('fingerprint-machines.single-pdf');
Route::get('fingerprint-machines/{fingerprint_machine}/edit', [\App\Http\Controllers\FingerprintMachineController::class, 'editData'])->name('fingerprint-machines.edit');
Route::put('fingerprint-machines/{fingerprint_machine}', [\App\Http\Controllers\FingerprintMachineController::class, 'updateData'])->name('fingerprint-machines.update');
Route::delete('fingerprint-machines/{fingerprint_machine}', [\App\Http\Controllers\FingerprintMachineController::class, 'destroyData'])->name('fingerprint-machines.destroy');
// Route::resource('fingerprint-machines', \App\Http\Controllers\FingerprintMachineController::class);
//route
        