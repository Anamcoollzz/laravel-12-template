
<?php

use Illuminate\Support\Facades\Route;

# Semester Module Routes
Route::get('yajra-semesters', [\App\Http\Controllers\SemesterController::class, 'index'])->name('semesters.index-yajra');
Route::get('yajra-semesters/ajax', [\App\Http\Controllers\SemesterController::class, 'yajraAjax'])->name('semesters.ajax-yajra');
Route::get('ajax-semesters', [\App\Http\Controllers\SemesterController::class, 'index'])->name('semesters.index-ajax');
Route::get('yajra-ajax-semesters', [\App\Http\Controllers\SemesterController::class, 'index'])->name('semesters.index-ajax-yajra');
Route::get('semesters/pdf', [\App\Http\Controllers\SemesterController::class, 'exportPdf'])->name('semesters.pdf');
Route::get('semesters/csv', [\App\Http\Controllers\SemesterController::class, 'exportCsv'])->name('semesters.csv');
Route::get('semesters/excel', [\App\Http\Controllers\SemesterController::class, 'exportExcel'])->name('semesters.excel');
Route::get('semesters/json', [\App\Http\Controllers\SemesterController::class, 'exportJson'])->name('semesters.json');
Route::get('semesters/import-excel-example', [\App\Http\Controllers\SemesterController::class, 'importExcelExample'])->name('semesters.import-excel-example');
Route::post('semesters/import-excel', [\App\Http\Controllers\SemesterController::class, 'importExcel'])->name('semesters.import-excel');
Route::post('semesters/duplicate/{semester}', [\App\Http\Controllers\SemesterController::class, 'duplicate'])->name('semesters.duplicate');
Route::put('semesters/restore/{semester}', [\App\Http\Controllers\SemesterController::class, 'restore'])->name('semesters.restore');
Route::put('semesters/restore-all', [\App\Http\Controllers\SemesterController::class, 'restoreAll'])->name('semesters.restore-all');
Route::delete('semesters/force-delete/{semester}', [\App\Http\Controllers\SemesterController::class, 'forceDelete'])->name('semesters.force-delete');
Route::delete('semesters/force-delete-all', [\App\Http\Controllers\SemesterController::class, 'forceDeleteAll'])->name('semesters.force-delete-all');
Route::get('semesters', [\App\Http\Controllers\SemesterController::class, 'indexData'])->name('semesters.index');
Route::get('semesters/create', [\App\Http\Controllers\SemesterController::class, 'createData'])->name('semesters.create');
Route::post('semesters', [\App\Http\Controllers\SemesterController::class, 'storeData'])->name('semesters.store');
Route::get('semesters/{semester}', [\App\Http\Controllers\SemesterController::class, 'showData'])->name('semesters.show');
Route::get('semesters/{semester}/edit', [\App\Http\Controllers\SemesterController::class, 'editData'])->name('semesters.edit');
Route::put('semesters/{semester}', [\App\Http\Controllers\SemesterController::class, 'updateData'])->name('semesters.update');
Route::delete('semesters/{semester}', [\App\Http\Controllers\SemesterController::class, 'destroyData'])->name('semesters.destroy');
// Route::resource('semesters', \App\Http\Controllers\SemesterController::class);
//route
        