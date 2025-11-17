
<?php

use Illuminate\Support\Facades\Route;

# Jenjang Pendidikan Module Routes
Route::get('yajra-education-levels', [\App\Http\Controllers\EducationLevelController::class, 'index'])->name('education-levels.index-yajra');
Route::get('yajra-education-levels/ajax', [\App\Http\Controllers\EducationLevelController::class, 'yajraAjax'])->name('education-levels.ajax-yajra');
Route::get('ajax-education-levels', [\App\Http\Controllers\EducationLevelController::class, 'index'])->name('education-levels.index-ajax');
Route::get('yajra-ajax-education-levels', [\App\Http\Controllers\EducationLevelController::class, 'index'])->name('education-levels.index-ajax-yajra');
Route::get('education-levels/pdf', [\App\Http\Controllers\EducationLevelController::class, 'exportPdf'])->name('education-levels.pdf');
Route::get('education-levels/csv', [\App\Http\Controllers\EducationLevelController::class, 'exportCsv'])->name('education-levels.csv');
Route::get('education-levels/excel', [\App\Http\Controllers\EducationLevelController::class, 'exportExcel'])->name('education-levels.excel');
Route::get('education-levels/json', [\App\Http\Controllers\EducationLevelController::class, 'exportJson'])->name('education-levels.json');
Route::get('education-levels/import-excel-example', [\App\Http\Controllers\EducationLevelController::class, 'importExcelExample'])->name('education-levels.import-excel-example');
Route::post('education-levels/import-excel', [\App\Http\Controllers\EducationLevelController::class, 'importExcel'])->name('education-levels.import-excel');
Route::post('education-levels/duplicate/{education_level}', [\App\Http\Controllers\EducationLevelController::class, 'duplicate'])->name('education-levels.duplicate');
Route::put('education-levels/restore/{education_level}', [\App\Http\Controllers\EducationLevelController::class, 'restore'])->name('education-levels.restore');
Route::put('education-levels/restore-all', [\App\Http\Controllers\EducationLevelController::class, 'restoreAll'])->name('education-levels.restore-all');
Route::delete('education-levels/force-delete/{education_level}', [\App\Http\Controllers\EducationLevelController::class, 'forceDelete'])->name('education-levels.force-delete');
Route::delete('education-levels/force-delete-all', [\App\Http\Controllers\EducationLevelController::class, 'forceDeleteAll'])->name('education-levels.force-delete-all');
Route::get('education-levels', [\App\Http\Controllers\EducationLevelController::class, 'indexData'])->name('education-levels.index');
Route::get('education-levels/create', [\App\Http\Controllers\EducationLevelController::class, 'createData'])->name('education-levels.create');
Route::post('education-levels', [\App\Http\Controllers\EducationLevelController::class, 'storeData'])->name('education-levels.store');
Route::get('education-levels/{education_level}', [\App\Http\Controllers\EducationLevelController::class, 'showData'])->name('education-levels.show');
Route::get('education-levels/{education_level}/edit', [\App\Http\Controllers\EducationLevelController::class, 'editData'])->name('education-levels.edit');
Route::put('education-levels/{education_level}', [\App\Http\Controllers\EducationLevelController::class, 'updateData'])->name('education-levels.update');
Route::delete('education-levels/{education_level}', [\App\Http\Controllers\EducationLevelController::class, 'destroyData'])->name('education-levels.destroy');
// Route::resource('education-levels', \App\Http\Controllers\EducationLevelController::class);
//route
        