
<?php

use Illuminate\Support\Facades\Route;

# Status Module Routes
Route::get('yajra-statuses', [\App\Http\Controllers\StatusController::class, 'index'])->name('statuses.index-yajra');
Route::get('yajra-statuses/ajax', [\App\Http\Controllers\StatusController::class, 'yajraAjax'])->name('statuses.ajax-yajra');
Route::get('ajax-statuses', [\App\Http\Controllers\StatusController::class, 'index'])->name('statuses.index-ajax');
Route::get('yajra-ajax-statuses', [\App\Http\Controllers\StatusController::class, 'index'])->name('statuses.index-ajax-yajra');
Route::get('statuses/pdf', [\App\Http\Controllers\StatusController::class, 'exportPdf'])->name('statuses.pdf');
Route::get('statuses/csv', [\App\Http\Controllers\StatusController::class, 'exportCsv'])->name('statuses.csv');
Route::get('statuses/excel', [\App\Http\Controllers\StatusController::class, 'exportExcel'])->name('statuses.excel');
Route::get('statuses/json', [\App\Http\Controllers\StatusController::class, 'exportJson'])->name('statuses.json');
Route::get('statuses/import-excel-example', [\App\Http\Controllers\StatusController::class, 'importExcelExample'])->name('statuses.import-excel-example');
Route::post('statuses/import-excel', [\App\Http\Controllers\StatusController::class, 'importExcel'])->name('statuses.import-excel');
Route::post('statuses/duplicate/{status}', [\App\Http\Controllers\StatusController::class, 'duplicate'])->name('statuses.duplicate');
Route::put('statuses/restore/{status}', [\App\Http\Controllers\StatusController::class, 'restore'])->name('statuses.restore');
Route::put('statuses/restore-all', [\App\Http\Controllers\StatusController::class, 'restoreAll'])->name('statuses.restore-all');
Route::delete('statuses/force-delete/{status}', [\App\Http\Controllers\StatusController::class, 'forceDelete'])->name('statuses.force-delete');
Route::delete('statuses/force-delete-all', [\App\Http\Controllers\StatusController::class, 'forceDeleteAll'])->name('statuses.force-delete-all');
Route::get('statuses', [\App\Http\Controllers\StatusController::class, 'indexData'])->name('statuses.index');
Route::get('statuses/create', [\App\Http\Controllers\StatusController::class, 'createData'])->name('statuses.create');
Route::post('statuses', [\App\Http\Controllers\StatusController::class, 'storeData'])->name('statuses.store');
Route::get('statuses/{status}', [\App\Http\Controllers\StatusController::class, 'showData'])->name('statuses.show');
Route::get('statuses-single-pdf/{status}', [\App\Http\Controllers\StatusController::class, 'singlePdf'])->name('statuses.single-pdf');
Route::get('statuses/{status}/edit', [\App\Http\Controllers\StatusController::class, 'editData'])->name('statuses.edit');
Route::put('statuses/{status}', [\App\Http\Controllers\StatusController::class, 'updateData'])->name('statuses.update');
Route::delete('statuses/{status}', [\App\Http\Controllers\StatusController::class, 'destroyData'])->name('statuses.destroy');
Route::delete('statuses-using-checkbox', [\App\Http\Controllers\StatusController::class, 'destroyUsingCheckbox'])->name('statuses.destroy-using-checkbox');
Route::delete('statuses-truncate', [\App\Http\Controllers\StatusController::class, 'truncate'])->name('statuses.truncate');
// Route::resource('statuses', \App\Http\Controllers\StatusController::class);
//route
        