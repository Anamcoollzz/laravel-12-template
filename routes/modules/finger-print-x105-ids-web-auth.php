
<?php

use Illuminate\Support\Facades\Route;

# Sidik Jari X105 ID Module Routes
Route::get('yajra-finger-print-x105-ids', [\App\Http\Controllers\FingerPrintX105IdController::class, 'index'])->name('finger-print-x105-ids.index-yajra');
Route::get('yajra-finger-print-x105-ids/ajax', [\App\Http\Controllers\FingerPrintX105IdController::class, 'yajraAjax'])->name('finger-print-x105-ids.ajax-yajra');
Route::get('ajax-finger-print-x105-ids', [\App\Http\Controllers\FingerPrintX105IdController::class, 'index'])->name('finger-print-x105-ids.index-ajax');
Route::get('yajra-ajax-finger-print-x105-ids', [\App\Http\Controllers\FingerPrintX105IdController::class, 'index'])->name('finger-print-x105-ids.index-ajax-yajra');
Route::get('finger-print-x105-ids/pdf', [\App\Http\Controllers\FingerPrintX105IdController::class, 'exportPdf'])->name('finger-print-x105-ids.pdf');
Route::get('finger-print-x105-ids/csv', [\App\Http\Controllers\FingerPrintX105IdController::class, 'exportCsv'])->name('finger-print-x105-ids.csv');
Route::get('finger-print-x105-ids/excel', [\App\Http\Controllers\FingerPrintX105IdController::class, 'exportExcel'])->name('finger-print-x105-ids.excel');
Route::get('finger-print-x105-ids/json', [\App\Http\Controllers\FingerPrintX105IdController::class, 'exportJson'])->name('finger-print-x105-ids.json');
Route::get('finger-print-x105-ids/import-excel-example', [\App\Http\Controllers\FingerPrintX105IdController::class, 'importExcelExample'])->name('finger-print-x105-ids.import-excel-example');
Route::post('finger-print-x105-ids/import-excel', [\App\Http\Controllers\FingerPrintX105IdController::class, 'importExcel'])->name('finger-print-x105-ids.import-excel');
Route::post('finger-print-x105-ids/duplicate/{finger_print_x105_id}', [\App\Http\Controllers\FingerPrintX105IdController::class, 'duplicate'])->name('finger-print-x105-ids.duplicate');
Route::put('finger-print-x105-ids/restore/{finger_print_x105_id}', [\App\Http\Controllers\FingerPrintX105IdController::class, 'restore'])->name('finger-print-x105-ids.restore');
Route::put('finger-print-x105-ids/restore-all', [\App\Http\Controllers\FingerPrintX105IdController::class, 'restoreAll'])->name('finger-print-x105-ids.restore-all');
Route::delete('finger-print-x105-ids/force-delete/{finger_print_x105_id}', [\App\Http\Controllers\FingerPrintX105IdController::class, 'forceDelete'])->name('finger-print-x105-ids.force-delete');
Route::delete('finger-print-x105-ids/force-delete-all', [\App\Http\Controllers\FingerPrintX105IdController::class, 'forceDeleteAll'])->name('finger-print-x105-ids.force-delete-all');
Route::get('finger-print-x105-ids', [\App\Http\Controllers\FingerPrintX105IdController::class, 'indexData'])->name('finger-print-x105-ids.index');
Route::get('finger-print-x105-ids/create', [\App\Http\Controllers\FingerPrintX105IdController::class, 'createData'])->name('finger-print-x105-ids.create');
Route::post('finger-print-x105-ids', [\App\Http\Controllers\FingerPrintX105IdController::class, 'storeData'])->name('finger-print-x105-ids.store');
Route::get('finger-print-x105-ids/{finger_print_x105_id}', [\App\Http\Controllers\FingerPrintX105IdController::class, 'showData'])->name('finger-print-x105-ids.show');
Route::get('finger-print-x105-ids/{finger_print_x105_id}/edit', [\App\Http\Controllers\FingerPrintX105IdController::class, 'editData'])->name('finger-print-x105-ids.edit');
Route::put('finger-print-x105-ids/{finger_print_x105_id}', [\App\Http\Controllers\FingerPrintX105IdController::class, 'updateData'])->name('finger-print-x105-ids.update');
Route::delete('finger-print-x105-ids/{finger_print_x105_id}', [\App\Http\Controllers\FingerPrintX105IdController::class, 'destroyData'])->name('finger-print-x105-ids.destroy');
// Route::resource('finger-print-x105-ids', \App\Http\Controllers\FingerPrintX105IdController::class);
//route
        