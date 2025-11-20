
<?php

use Illuminate\Support\Facades\Route;

# Tahun Pelajaran Module Routes
Route::get('yajra-school-years', [\App\Http\Controllers\SchoolYearController::class, 'index'])->name('school-years.index-yajra');
Route::get('yajra-school-years/ajax', [\App\Http\Controllers\SchoolYearController::class, 'yajraAjax'])->name('school-years.ajax-yajra');
Route::get('ajax-school-years', [\App\Http\Controllers\SchoolYearController::class, 'index'])->name('school-years.index-ajax');
Route::get('yajra-ajax-school-years', [\App\Http\Controllers\SchoolYearController::class, 'index'])->name('school-years.index-ajax-yajra');
Route::get('school-years/pdf', [\App\Http\Controllers\SchoolYearController::class, 'exportPdf'])->name('school-years.pdf');
Route::get('school-years/csv', [\App\Http\Controllers\SchoolYearController::class, 'exportCsv'])->name('school-years.csv');
Route::get('school-years/excel', [\App\Http\Controllers\SchoolYearController::class, 'exportExcel'])->name('school-years.excel');
Route::get('school-years/json', [\App\Http\Controllers\SchoolYearController::class, 'exportJson'])->name('school-years.json');
Route::get('school-years/import-excel-example', [\App\Http\Controllers\SchoolYearController::class, 'importExcelExample'])->name('school-years.import-excel-example');
Route::post('school-years/import-excel', [\App\Http\Controllers\SchoolYearController::class, 'importExcel'])->name('school-years.import-excel');
Route::post('school-years/duplicate/{school_year}', [\App\Http\Controllers\SchoolYearController::class, 'duplicate'])->name('school-years.duplicate');
Route::put('school-years/restore/{school_year}', [\App\Http\Controllers\SchoolYearController::class, 'restore'])->name('school-years.restore');
Route::put('school-years/restore-all', [\App\Http\Controllers\SchoolYearController::class, 'restoreAll'])->name('school-years.restore-all');
Route::delete('school-years/force-delete/{school_year}', [\App\Http\Controllers\SchoolYearController::class, 'forceDelete'])->name('school-years.force-delete');
Route::delete('school-years/force-delete-all', [\App\Http\Controllers\SchoolYearController::class, 'forceDeleteAll'])->name('school-years.force-delete-all');
Route::get('school-years', [\App\Http\Controllers\SchoolYearController::class, 'indexData'])->name('school-years.index');
Route::get('school-years/create', [\App\Http\Controllers\SchoolYearController::class, 'createData'])->name('school-years.create');
Route::post('school-years', [\App\Http\Controllers\SchoolYearController::class, 'storeData'])->name('school-years.store');
Route::get('school-years/{school_year}', [\App\Http\Controllers\SchoolYearController::class, 'showData'])->name('school-years.show');
Route::get('school-years/{school_year}/edit', [\App\Http\Controllers\SchoolYearController::class, 'editData'])->name('school-years.edit');
Route::put('school-years/{school_year}', [\App\Http\Controllers\SchoolYearController::class, 'updateData'])->name('school-years.update');
Route::delete('school-years/{school_year}', [\App\Http\Controllers\SchoolYearController::class, 'destroyData'])->name('school-years.destroy');
// Route::resource('school-years', \App\Http\Controllers\SchoolYearController::class);
//route
        