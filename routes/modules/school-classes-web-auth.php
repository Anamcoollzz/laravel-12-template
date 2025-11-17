
<?php

use Illuminate\Support\Facades\Route;

# Kelas Module Routes
Route::get('yajra-school-classes', [\App\Http\Controllers\SchoolClassController::class, 'index'])->name('school-classes.index-yajra');
Route::get('yajra-school-classes/ajax', [\App\Http\Controllers\SchoolClassController::class, 'yajraAjax'])->name('school-classes.ajax-yajra');
Route::get('ajax-school-classes', [\App\Http\Controllers\SchoolClassController::class, 'index'])->name('school-classes.index-ajax');
Route::get('yajra-ajax-school-classes', [\App\Http\Controllers\SchoolClassController::class, 'index'])->name('school-classes.index-ajax-yajra');
Route::get('school-classes/pdf', [\App\Http\Controllers\SchoolClassController::class, 'exportPdf'])->name('school-classes.pdf');
Route::get('school-classes/csv', [\App\Http\Controllers\SchoolClassController::class, 'exportCsv'])->name('school-classes.csv');
Route::get('school-classes/excel', [\App\Http\Controllers\SchoolClassController::class, 'exportExcel'])->name('school-classes.excel');
Route::get('school-classes/json', [\App\Http\Controllers\SchoolClassController::class, 'exportJson'])->name('school-classes.json');
Route::get('school-classes/import-excel-example', [\App\Http\Controllers\SchoolClassController::class, 'importExcelExample'])->name('school-classes.import-excel-example');
Route::post('school-classes/import-excel', [\App\Http\Controllers\SchoolClassController::class, 'importExcel'])->name('school-classes.import-excel');
Route::post('school-classes/duplicate/{school_class}', [\App\Http\Controllers\SchoolClassController::class, 'duplicate'])->name('school-classes.duplicate');
Route::put('school-classes/restore/{school_class}', [\App\Http\Controllers\SchoolClassController::class, 'restore'])->name('school-classes.restore');
Route::put('school-classes/restore-all', [\App\Http\Controllers\SchoolClassController::class, 'restoreAll'])->name('school-classes.restore-all');
Route::delete('school-classes/force-delete/{school_class}', [\App\Http\Controllers\SchoolClassController::class, 'forceDelete'])->name('school-classes.force-delete');
Route::delete('school-classes/force-delete-all', [\App\Http\Controllers\SchoolClassController::class, 'forceDeleteAll'])->name('school-classes.force-delete-all');
Route::get('school-classes', [\App\Http\Controllers\SchoolClassController::class, 'indexData'])->name('school-classes.index');
Route::get('school-classes/create', [\App\Http\Controllers\SchoolClassController::class, 'createData'])->name('school-classes.create');
Route::post('school-classes', [\App\Http\Controllers\SchoolClassController::class, 'storeData'])->name('school-classes.store');
Route::get('school-classes/{school_class}', [\App\Http\Controllers\SchoolClassController::class, 'showData'])->name('school-classes.show');
Route::get('school-classes/{school_class}/edit', [\App\Http\Controllers\SchoolClassController::class, 'editData'])->name('school-classes.edit');
Route::put('school-classes/{school_class}', [\App\Http\Controllers\SchoolClassController::class, 'updateData'])->name('school-classes.update');
Route::delete('school-classes/{school_class}', [\App\Http\Controllers\SchoolClassController::class, 'destroyData'])->name('school-classes.destroy');
// Route::resource('school-classes', \App\Http\Controllers\SchoolClassController::class);
//route
        