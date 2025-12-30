
<?php

use Illuminate\Support\Facades\Route;

# Function Module Routes
Route::get('yajra-pocari-functions', [\App\Http\Controllers\PocariFunctionController::class, 'index'])->name('pocari-functions.index-yajra');
Route::get('yajra-pocari-functions/ajax', [\App\Http\Controllers\PocariFunctionController::class, 'yajraAjax'])->name('pocari-functions.ajax-yajra');
Route::get('ajax-pocari-functions', [\App\Http\Controllers\PocariFunctionController::class, 'index'])->name('pocari-functions.index-ajax');
Route::get('yajra-ajax-pocari-functions', [\App\Http\Controllers\PocariFunctionController::class, 'index'])->name('pocari-functions.index-ajax-yajra');
Route::get('pocari-functions/pdf', [\App\Http\Controllers\PocariFunctionController::class, 'exportPdf'])->name('pocari-functions.pdf');
Route::get('pocari-functions/csv', [\App\Http\Controllers\PocariFunctionController::class, 'exportCsv'])->name('pocari-functions.csv');
Route::get('pocari-functions/excel', [\App\Http\Controllers\PocariFunctionController::class, 'exportExcel'])->name('pocari-functions.excel');
Route::get('pocari-functions/json', [\App\Http\Controllers\PocariFunctionController::class, 'exportJson'])->name('pocari-functions.json');
Route::get('pocari-functions/import-excel-example', [\App\Http\Controllers\PocariFunctionController::class, 'importExcelExample'])->name('pocari-functions.import-excel-example');
Route::post('pocari-functions/import-excel', [\App\Http\Controllers\PocariFunctionController::class, 'importExcel'])->name('pocari-functions.import-excel');
Route::post('pocari-functions/duplicate/{pocari_function}', [\App\Http\Controllers\PocariFunctionController::class, 'duplicate'])->name('pocari-functions.duplicate');
Route::put('pocari-functions/restore/{pocari_function}', [\App\Http\Controllers\PocariFunctionController::class, 'restore'])->name('pocari-functions.restore');
Route::put('pocari-functions/restore-all', [\App\Http\Controllers\PocariFunctionController::class, 'restoreAll'])->name('pocari-functions.restore-all');
Route::delete('pocari-functions/force-delete/{pocari_function}', [\App\Http\Controllers\PocariFunctionController::class, 'forceDelete'])->name('pocari-functions.force-delete');
Route::delete('pocari-functions/force-delete-all', [\App\Http\Controllers\PocariFunctionController::class, 'forceDeleteAll'])->name('pocari-functions.force-delete-all');
Route::get('pocari-functions', [\App\Http\Controllers\PocariFunctionController::class, 'indexData'])->name('pocari-functions.index');
Route::get('pocari-functions/create', [\App\Http\Controllers\PocariFunctionController::class, 'createData'])->name('pocari-functions.create');
Route::post('pocari-functions', [\App\Http\Controllers\PocariFunctionController::class, 'storeData'])->name('pocari-functions.store');
Route::get('pocari-functions/{pocari_function}', [\App\Http\Controllers\PocariFunctionController::class, 'showData'])->name('pocari-functions.show');
Route::get('pocari-functions-single-pdf/{pocari_function}', [\App\Http\Controllers\PocariFunctionController::class, 'singlePdf'])->name('pocari-functions.single-pdf');
Route::get('pocari-functions/{pocari_function}/edit', [\App\Http\Controllers\PocariFunctionController::class, 'editData'])->name('pocari-functions.edit');
Route::put('pocari-functions/{pocari_function}', [\App\Http\Controllers\PocariFunctionController::class, 'updateData'])->name('pocari-functions.update');
Route::delete('pocari-functions/{pocari_function}', [\App\Http\Controllers\PocariFunctionController::class, 'destroyData'])->name('pocari-functions.destroy');
Route::delete('pocari-functions-using-checkbox', [\App\Http\Controllers\PocariFunctionController::class, 'destroyUsingCheckbox'])->name('pocari-functions.destroy-using-checkbox');
Route::delete('pocari-functions-truncate', [\App\Http\Controllers\PocariFunctionController::class, 'truncate'])->name('pocari-functions.truncate');
// Route::resource('pocari-functions', \App\Http\Controllers\PocariFunctionController::class);
//route
        