
<?php

use Illuminate\Support\Facades\Route;

# Work Field Module Routes
Route::get('yajra-work-fields', [\App\Http\Controllers\WorkFieldController::class, 'index'])->name('work-fields.index-yajra');
Route::get('yajra-work-fields/ajax', [\App\Http\Controllers\WorkFieldController::class, 'yajraAjax'])->name('work-fields.ajax-yajra');
Route::get('ajax-work-fields', [\App\Http\Controllers\WorkFieldController::class, 'index'])->name('work-fields.index-ajax');
Route::get('yajra-ajax-work-fields', [\App\Http\Controllers\WorkFieldController::class, 'index'])->name('work-fields.index-ajax-yajra');
Route::get('work-fields/pdf', [\App\Http\Controllers\WorkFieldController::class, 'exportPdf'])->name('work-fields.pdf');
Route::get('work-fields/csv', [\App\Http\Controllers\WorkFieldController::class, 'exportCsv'])->name('work-fields.csv');
Route::get('work-fields/excel', [\App\Http\Controllers\WorkFieldController::class, 'exportExcel'])->name('work-fields.excel');
Route::get('work-fields/json', [\App\Http\Controllers\WorkFieldController::class, 'exportJson'])->name('work-fields.json');
Route::get('work-fields/import-excel-example', [\App\Http\Controllers\WorkFieldController::class, 'importExcelExample'])->name('work-fields.import-excel-example');
Route::post('work-fields/import-excel', [\App\Http\Controllers\WorkFieldController::class, 'importExcel'])->name('work-fields.import-excel');
Route::post('work-fields/duplicate/{work_field}', [\App\Http\Controllers\WorkFieldController::class, 'duplicate'])->name('work-fields.duplicate');
Route::put('work-fields/restore/{work_field}', [\App\Http\Controllers\WorkFieldController::class, 'restore'])->name('work-fields.restore');
Route::put('work-fields/restore-all', [\App\Http\Controllers\WorkFieldController::class, 'restoreAll'])->name('work-fields.restore-all');
Route::delete('work-fields/force-delete/{work_field}', [\App\Http\Controllers\WorkFieldController::class, 'forceDelete'])->name('work-fields.force-delete');
Route::delete('work-fields/force-delete-all', [\App\Http\Controllers\WorkFieldController::class, 'forceDeleteAll'])->name('work-fields.force-delete-all');
Route::get('work-fields', [\App\Http\Controllers\WorkFieldController::class, 'indexData'])->name('work-fields.index');
Route::get('work-fields/create', [\App\Http\Controllers\WorkFieldController::class, 'createData'])->name('work-fields.create');
Route::post('work-fields', [\App\Http\Controllers\WorkFieldController::class, 'storeData'])->name('work-fields.store');
Route::get('work-fields/{work_field}', [\App\Http\Controllers\WorkFieldController::class, 'showData'])->name('work-fields.show');
Route::get('work-fields-single-pdf/{work_field}', [\App\Http\Controllers\WorkFieldController::class, 'singlePdf'])->name('work-fields.single-pdf');
Route::get('work-fields/{work_field}/edit', [\App\Http\Controllers\WorkFieldController::class, 'editData'])->name('work-fields.edit');
Route::put('work-fields/{work_field}', [\App\Http\Controllers\WorkFieldController::class, 'updateData'])->name('work-fields.update');
Route::delete('work-fields/{work_field}', [\App\Http\Controllers\WorkFieldController::class, 'destroyData'])->name('work-fields.destroy');
Route::delete('work-fields-using-checkbox', [\App\Http\Controllers\WorkFieldController::class, 'destroyUsingCheckbox'])->name('work-fields.destroy-using-checkbox');
Route::delete('work-fields-truncate', [\App\Http\Controllers\WorkFieldController::class, 'truncate'])->name('work-fields.truncate');
// Route::resource('work-fields', \App\Http\Controllers\WorkFieldController::class);
//route
        