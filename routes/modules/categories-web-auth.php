
<?php

use Illuminate\Support\Facades\Route;

# Kategori Module Routes
Route::get('yajra-categories', [\App\Http\Controllers\CategoryController::class, 'index'])->name('categories.index-yajra');
Route::get('yajra-categories/ajax', [\App\Http\Controllers\CategoryController::class, 'yajraAjax'])->name('categories.ajax-yajra');
Route::get('ajax-categories', [\App\Http\Controllers\CategoryController::class, 'index'])->name('categories.index-ajax');
Route::get('yajra-ajax-categories', [\App\Http\Controllers\CategoryController::class, 'index'])->name('categories.index-ajax-yajra');
Route::get('categories/pdf', [\App\Http\Controllers\CategoryController::class, 'exportPdf'])->name('categories.pdf');
Route::get('categories/csv', [\App\Http\Controllers\CategoryController::class, 'exportCsv'])->name('categories.csv');
Route::get('categories/excel', [\App\Http\Controllers\CategoryController::class, 'exportExcel'])->name('categories.excel');
Route::get('categories/json', [\App\Http\Controllers\CategoryController::class, 'exportJson'])->name('categories.json');
Route::get('categories/import-excel-example', [\App\Http\Controllers\CategoryController::class, 'importExcelExample'])->name('categories.import-excel-example');
Route::post('categories/import-excel', [\App\Http\Controllers\CategoryController::class, 'importExcel'])->name('categories.import-excel');
Route::post('categories/duplicate/{category}', [\App\Http\Controllers\CategoryController::class, 'duplicate'])->name('categories.duplicate');
Route::put('categories/restore/{category}', [\App\Http\Controllers\CategoryController::class, 'restore'])->name('categories.restore');
Route::put('categories/restore-all', [\App\Http\Controllers\CategoryController::class, 'restoreAll'])->name('categories.restore-all');
Route::delete('categories/force-delete/{category}', [\App\Http\Controllers\CategoryController::class, 'forceDelete'])->name('categories.force-delete');
Route::delete('categories/force-delete-all', [\App\Http\Controllers\CategoryController::class, 'forceDeleteAll'])->name('categories.force-delete-all');
Route::get('categories', [\App\Http\Controllers\CategoryController::class, 'indexData'])->name('categories.index');
Route::get('categories/create', [\App\Http\Controllers\CategoryController::class, 'createData'])->name('categories.create');
Route::post('categories', [\App\Http\Controllers\CategoryController::class, 'storeData'])->name('categories.store');
Route::get('categories/{category}', [\App\Http\Controllers\CategoryController::class, 'showData'])->name('categories.show');
Route::get('categories-single-pdf/{category}', [\App\Http\Controllers\CategoryController::class, 'singlePdf'])->name('categories.single-pdf');
Route::get('categories/{category}/edit', [\App\Http\Controllers\CategoryController::class, 'editData'])->name('categories.edit');
Route::put('categories/{category}', [\App\Http\Controllers\CategoryController::class, 'updateData'])->name('categories.update');
Route::delete('categories/{category}', [\App\Http\Controllers\CategoryController::class, 'destroyData'])->name('categories.destroy');
Route::delete('categories-using-checkbox', [\App\Http\Controllers\CategoryController::class, 'destroyUsingCheckbox'])->name('categories.destroy-using-checkbox');
Route::delete('categories-truncate', [\App\Http\Controllers\CategoryController::class, 'truncate'])->name('categories.truncate');
// Route::resource('categories', \App\Http\Controllers\CategoryController::class);
//route
        