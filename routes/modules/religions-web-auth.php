
<?php

use Illuminate\Support\Facades\Route;

# Agama Module Routes
Route::get('yajra-religions', [\App\Http\Controllers\ReligionController::class, 'index'])->name('religions.index-yajra');
Route::get('yajra-religions/ajax', [\App\Http\Controllers\ReligionController::class, 'yajraAjax'])->name('religions.ajax-yajra');
Route::get('ajax-religions', [\App\Http\Controllers\ReligionController::class, 'index'])->name('religions.index-ajax');
Route::get('yajra-ajax-religions', [\App\Http\Controllers\ReligionController::class, 'index'])->name('religions.index-ajax-yajra');
Route::get('religions/pdf', [\App\Http\Controllers\ReligionController::class, 'exportPdf'])->name('religions.pdf');
Route::get('religions/csv', [\App\Http\Controllers\ReligionController::class, 'exportCsv'])->name('religions.csv');
Route::get('religions/excel', [\App\Http\Controllers\ReligionController::class, 'exportExcel'])->name('religions.excel');
Route::get('religions/json', [\App\Http\Controllers\ReligionController::class, 'exportJson'])->name('religions.json');
Route::get('religions/import-excel-example', [\App\Http\Controllers\ReligionController::class, 'importExcelExample'])->name('religions.import-excel-example');
Route::post('religions/import-excel', [\App\Http\Controllers\ReligionController::class, 'importExcel'])->name('religions.import-excel');
Route::post('religions/duplicate/{religion}', [\App\Http\Controllers\ReligionController::class, 'duplicate'])->name('religions.duplicate');
Route::put('religions/restore/{religion}', [\App\Http\Controllers\ReligionController::class, 'restore'])->name('religions.restore');
Route::put('religions/restore-all', [\App\Http\Controllers\ReligionController::class, 'restoreAll'])->name('religions.restore-all');
Route::delete('religions/force-delete/{religion}', [\App\Http\Controllers\ReligionController::class, 'forceDelete'])->name('religions.force-delete');
Route::delete('religions/force-delete-all', [\App\Http\Controllers\ReligionController::class, 'forceDeleteAll'])->name('religions.force-delete-all');
Route::get('religions', [\App\Http\Controllers\ReligionController::class, 'indexData'])->name('religions.index');
Route::get('religions/create', [\App\Http\Controllers\ReligionController::class, 'createData'])->name('religions.create');
Route::post('religions', [\App\Http\Controllers\ReligionController::class, 'storeData'])->name('religions.store');
Route::get('religions/{religion}', [\App\Http\Controllers\ReligionController::class, 'showData'])->name('religions.show');
Route::get('religions/{religion}/edit', [\App\Http\Controllers\ReligionController::class, 'editData'])->name('religions.edit');
Route::put('religions/{religion}', [\App\Http\Controllers\ReligionController::class, 'updateData'])->name('religions.update');
Route::delete('religions/{religion}', [\App\Http\Controllers\ReligionController::class, 'destroyData'])->name('religions.destroy');
// Route::resource('religions', \App\Http\Controllers\ReligionController::class);
//route
        