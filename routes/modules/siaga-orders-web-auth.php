
<?php

use Illuminate\Support\Facades\Route;

# Siaga Order Module Routes
Route::get('yajra-siaga-orders', [\App\Http\Controllers\SiagaOrderController::class, 'index'])->name('siaga-orders.index-yajra');
Route::get('yajra-siaga-orders/ajax', [\App\Http\Controllers\SiagaOrderController::class, 'yajraAjax'])->name('siaga-orders.ajax-yajra');
Route::get('ajax-siaga-orders', [\App\Http\Controllers\SiagaOrderController::class, 'index'])->name('siaga-orders.index-ajax');
Route::get('yajra-ajax-siaga-orders', [\App\Http\Controllers\SiagaOrderController::class, 'index'])->name('siaga-orders.index-ajax-yajra');
Route::get('siaga-orders/pdf', [\App\Http\Controllers\SiagaOrderController::class, 'exportPdf'])->name('siaga-orders.pdf');
Route::get('siaga-orders/csv', [\App\Http\Controllers\SiagaOrderController::class, 'exportCsv'])->name('siaga-orders.csv');
Route::get('siaga-orders/excel', [\App\Http\Controllers\SiagaOrderController::class, 'exportExcel'])->name('siaga-orders.excel');
Route::get('siaga-orders/json', [\App\Http\Controllers\SiagaOrderController::class, 'exportJson'])->name('siaga-orders.json');
Route::get('siaga-orders/import-excel-example', [\App\Http\Controllers\SiagaOrderController::class, 'importExcelExample'])->name('siaga-orders.import-excel-example');
Route::post('siaga-orders/import-excel', [\App\Http\Controllers\SiagaOrderController::class, 'importExcel'])->name('siaga-orders.import-excel');
Route::post('siaga-orders/duplicate/{siaga_order}', [\App\Http\Controllers\SiagaOrderController::class, 'duplicate'])->name('siaga-orders.duplicate');
Route::put('siaga-orders/restore/{siaga_order}', [\App\Http\Controllers\SiagaOrderController::class, 'restore'])->name('siaga-orders.restore');
Route::put('siaga-orders/restore-all', [\App\Http\Controllers\SiagaOrderController::class, 'restoreAll'])->name('siaga-orders.restore-all');
Route::delete('siaga-orders/force-delete/{siaga_order}', [\App\Http\Controllers\SiagaOrderController::class, 'forceDelete'])->name('siaga-orders.force-delete');
Route::delete('siaga-orders/force-delete-all', [\App\Http\Controllers\SiagaOrderController::class, 'forceDeleteAll'])->name('siaga-orders.force-delete-all');
Route::get('siaga-orders', [\App\Http\Controllers\SiagaOrderController::class, 'indexData'])->name('siaga-orders.index');
Route::get('siaga-orders/create', [\App\Http\Controllers\SiagaOrderController::class, 'createData'])->name('siaga-orders.create');
Route::post('siaga-orders', [\App\Http\Controllers\SiagaOrderController::class, 'storeData'])->name('siaga-orders.store');
Route::get('siaga-orders/{siaga_order}', [\App\Http\Controllers\SiagaOrderController::class, 'showData'])->name('siaga-orders.show');
Route::get('siaga-orders-single-pdf/{siaga_order}', [\App\Http\Controllers\SiagaOrderController::class, 'singlePdf'])->name('siaga-orders.single-pdf');
Route::get('siaga-orders/{siaga_order}/edit', [\App\Http\Controllers\SiagaOrderController::class, 'editData'])->name('siaga-orders.edit');
Route::put('siaga-orders/{siaga_order}', [\App\Http\Controllers\SiagaOrderController::class, 'updateData'])->name('siaga-orders.update');
Route::delete('siaga-orders/{siaga_order}', [\App\Http\Controllers\SiagaOrderController::class, 'destroyData'])->name('siaga-orders.destroy');
Route::delete('siaga-orders-using-checkbox', [\App\Http\Controllers\SiagaOrderController::class, 'destroyUsingCheckbox'])->name('siaga-orders.destroy-using-checkbox');
Route::delete('siaga-orders-truncate', [\App\Http\Controllers\SiagaOrderController::class, 'truncate'])->name('siaga-orders.truncate');
// Route::resource('siaga-orders', \App\Http\Controllers\SiagaOrderController::class);
//route
        