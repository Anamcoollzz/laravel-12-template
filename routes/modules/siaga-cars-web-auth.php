
<?php

use Illuminate\Support\Facades\Route;

# Mobil Siaga Module Routes
Route::get('yajra-siaga-cars', [\App\Http\Controllers\SiagaCarController::class, 'index'])->name('siaga-cars.index-yajra');
Route::get('yajra-siaga-cars/ajax', [\App\Http\Controllers\SiagaCarController::class, 'yajraAjax'])->name('siaga-cars.ajax-yajra');
Route::get('ajax-siaga-cars', [\App\Http\Controllers\SiagaCarController::class, 'index'])->name('siaga-cars.index-ajax');
Route::get('yajra-ajax-siaga-cars', [\App\Http\Controllers\SiagaCarController::class, 'index'])->name('siaga-cars.index-ajax-yajra');
Route::get('siaga-cars/pdf', [\App\Http\Controllers\SiagaCarController::class, 'exportPdf'])->name('siaga-cars.pdf');
Route::get('siaga-cars/csv', [\App\Http\Controllers\SiagaCarController::class, 'exportCsv'])->name('siaga-cars.csv');
Route::get('siaga-cars/excel', [\App\Http\Controllers\SiagaCarController::class, 'exportExcel'])->name('siaga-cars.excel');
Route::get('siaga-cars/json', [\App\Http\Controllers\SiagaCarController::class, 'exportJson'])->name('siaga-cars.json');
Route::get('siaga-cars/import-excel-example', [\App\Http\Controllers\SiagaCarController::class, 'importExcelExample'])->name('siaga-cars.import-excel-example');
Route::post('siaga-cars/import-excel', [\App\Http\Controllers\SiagaCarController::class, 'importExcel'])->name('siaga-cars.import-excel');
Route::post('siaga-cars/duplicate/{siaga_car}', [\App\Http\Controllers\SiagaCarController::class, 'duplicate'])->name('siaga-cars.duplicate');
Route::put('siaga-cars/restore/{siaga_car}', [\App\Http\Controllers\SiagaCarController::class, 'restore'])->name('siaga-cars.restore');
Route::put('siaga-cars/restore-all', [\App\Http\Controllers\SiagaCarController::class, 'restoreAll'])->name('siaga-cars.restore-all');
Route::delete('siaga-cars/force-delete/{siaga_car}', [\App\Http\Controllers\SiagaCarController::class, 'forceDelete'])->name('siaga-cars.force-delete');
Route::delete('siaga-cars/force-delete-all', [\App\Http\Controllers\SiagaCarController::class, 'forceDeleteAll'])->name('siaga-cars.force-delete-all');
Route::get('siaga-cars', [\App\Http\Controllers\SiagaCarController::class, 'indexData'])->name('siaga-cars.index');
Route::get('siaga-cars/create', [\App\Http\Controllers\SiagaCarController::class, 'createData'])->name('siaga-cars.create');
Route::post('siaga-cars', [\App\Http\Controllers\SiagaCarController::class, 'storeData'])->name('siaga-cars.store');
Route::get('siaga-cars/{siaga_car}', [\App\Http\Controllers\SiagaCarController::class, 'showData'])->name('siaga-cars.show');
Route::get('siaga-cars-single-pdf/{siaga_car}', [\App\Http\Controllers\SiagaCarController::class, 'singlePdf'])->name('siaga-cars.single-pdf');
Route::get('siaga-cars/{siaga_car}/edit', [\App\Http\Controllers\SiagaCarController::class, 'editData'])->name('siaga-cars.edit');
Route::put('siaga-cars/{siaga_car}', [\App\Http\Controllers\SiagaCarController::class, 'updateData'])->name('siaga-cars.update');
Route::delete('siaga-cars/{siaga_car}', [\App\Http\Controllers\SiagaCarController::class, 'destroyData'])->name('siaga-cars.destroy');
Route::delete('siaga-cars-using-checkbox', [\App\Http\Controllers\SiagaCarController::class, 'destroyUsingCheckbox'])->name('siaga-cars.destroy-using-checkbox');
Route::delete('siaga-cars-truncate', [\App\Http\Controllers\SiagaCarController::class, 'truncate'])->name('siaga-cars.truncate');
// Route::resource('siaga-cars', \App\Http\Controllers\SiagaCarController::class);
//route
        