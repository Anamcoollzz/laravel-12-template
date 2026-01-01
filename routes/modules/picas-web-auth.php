
<?php

use Illuminate\Support\Facades\Route;

# Pica Module Routes
Route::get('yajra-picas', [\App\Http\Controllers\PicaController::class, 'index'])->name('picas.index-yajra');
Route::get('yajra-picas/ajax', [\App\Http\Controllers\PicaController::class, 'yajraAjax'])->name('picas.ajax-yajra');
Route::get('ajax-picas', [\App\Http\Controllers\PicaController::class, 'index'])->name('picas.index-ajax');
Route::get('yajra-ajax-picas', [\App\Http\Controllers\PicaController::class, 'index'])->name('picas.index-ajax-yajra');
Route::get('picas/pdf', [\App\Http\Controllers\PicaController::class, 'exportPdf'])->name('picas.pdf');
Route::get('picas/csv', [\App\Http\Controllers\PicaController::class, 'exportCsv'])->name('picas.csv');
Route::get('picas/excel', [\App\Http\Controllers\PicaController::class, 'exportExcel'])->name('picas.excel');
Route::get('picas/json', [\App\Http\Controllers\PicaController::class, 'exportJson'])->name('picas.json');
Route::get('picas/import-excel-example', [\App\Http\Controllers\PicaController::class, 'importExcelExample'])->name('picas.import-excel-example');
Route::post('picas/import-excel', [\App\Http\Controllers\PicaController::class, 'importExcel'])->name('picas.import-excel');
Route::post('picas/duplicate/{pica}', [\App\Http\Controllers\PicaController::class, 'duplicate'])->name('picas.duplicate');
Route::put('picas/restore/{pica}', [\App\Http\Controllers\PicaController::class, 'restore'])->name('picas.restore');
Route::put('picas/restore-all', [\App\Http\Controllers\PicaController::class, 'restoreAll'])->name('picas.restore-all');
Route::delete('picas/force-delete/{pica}', [\App\Http\Controllers\PicaController::class, 'forceDelete'])->name('picas.force-delete');
Route::delete('picas/force-delete-all', [\App\Http\Controllers\PicaController::class, 'forceDeleteAll'])->name('picas.force-delete-all');
Route::get('picas', [\App\Http\Controllers\PicaController::class, 'indexData'])->name('picas.index');
Route::get('picas/create', [\App\Http\Controllers\PicaController::class, 'createData'])->name('picas.create');
Route::post('picas', [\App\Http\Controllers\PicaController::class, 'storeData'])->name('picas.store');
Route::get('picas/{pica}', [\App\Http\Controllers\PicaController::class, 'showData'])->name('picas.show');
Route::get('picas-single-pdf/{pica}', [\App\Http\Controllers\PicaController::class, 'singlePdf'])->name('picas.single-pdf');
Route::get('picas/{pica}/edit', [\App\Http\Controllers\PicaController::class, 'editData'])->name('picas.edit');
Route::put('picas/{pica}', [\App\Http\Controllers\PicaController::class, 'updateData'])->name('picas.update');
Route::delete('picas/{pica}', [\App\Http\Controllers\PicaController::class, 'destroyData'])->name('picas.destroy');
Route::delete('picas-using-checkbox', [\App\Http\Controllers\PicaController::class, 'destroyUsingCheckbox'])->name('picas.destroy-using-checkbox');
Route::delete('picas-truncate', [\App\Http\Controllers\PicaController::class, 'truncate'])->name('picas.truncate');
// Route::resource('picas', \App\Http\Controllers\PicaController::class);
//route
        