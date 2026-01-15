
<?php

use Illuminate\Support\Facades\Route;

# Supervisi Note Module Routes
Route::get('yajra-supervisi-notes', [\App\Http\Controllers\SupervisiNoteController::class, 'index'])->name('supervisi-notes.index-yajra');
Route::get('yajra-supervisi-notes/ajax', [\App\Http\Controllers\SupervisiNoteController::class, 'yajraAjax'])->name('supervisi-notes.ajax-yajra');
Route::get('ajax-supervisi-notes', [\App\Http\Controllers\SupervisiNoteController::class, 'index'])->name('supervisi-notes.index-ajax');
Route::get('yajra-ajax-supervisi-notes', [\App\Http\Controllers\SupervisiNoteController::class, 'index'])->name('supervisi-notes.index-ajax-yajra');
Route::get('supervisi-notes/pdf', [\App\Http\Controllers\SupervisiNoteController::class, 'exportPdf'])->name('supervisi-notes.pdf');
Route::get('supervisi-notes/csv', [\App\Http\Controllers\SupervisiNoteController::class, 'exportCsv'])->name('supervisi-notes.csv');
Route::get('supervisi-notes/excel', [\App\Http\Controllers\SupervisiNoteController::class, 'exportExcel'])->name('supervisi-notes.excel');
Route::get('supervisi-notes/json', [\App\Http\Controllers\SupervisiNoteController::class, 'exportJson'])->name('supervisi-notes.json');
Route::get('supervisi-notes/import-excel-example', [\App\Http\Controllers\SupervisiNoteController::class, 'importExcelExample'])->name('supervisi-notes.import-excel-example');
Route::post('supervisi-notes/import-excel', [\App\Http\Controllers\SupervisiNoteController::class, 'importExcel'])->name('supervisi-notes.import-excel');
Route::post('supervisi-notes/duplicate/{supervisi_note}', [\App\Http\Controllers\SupervisiNoteController::class, 'duplicate'])->name('supervisi-notes.duplicate');
Route::put('supervisi-notes/restore/{supervisi_note}', [\App\Http\Controllers\SupervisiNoteController::class, 'restore'])->name('supervisi-notes.restore');
Route::put('supervisi-notes/restore-all', [\App\Http\Controllers\SupervisiNoteController::class, 'restoreAll'])->name('supervisi-notes.restore-all');
Route::delete('supervisi-notes/force-delete/{supervisi_note}', [\App\Http\Controllers\SupervisiNoteController::class, 'forceDelete'])->name('supervisi-notes.force-delete');
Route::delete('supervisi-notes/force-delete-all', [\App\Http\Controllers\SupervisiNoteController::class, 'forceDeleteAll'])->name('supervisi-notes.force-delete-all');
Route::get('supervisi-notes', [\App\Http\Controllers\SupervisiNoteController::class, 'indexData'])->name('supervisi-notes.index');
Route::get('supervisi-notes/create', [\App\Http\Controllers\SupervisiNoteController::class, 'createData'])->name('supervisi-notes.create');
Route::post('supervisi-notes', [\App\Http\Controllers\SupervisiNoteController::class, 'storeData'])->name('supervisi-notes.store');
Route::get('supervisi-notes/{supervisi_note}', [\App\Http\Controllers\SupervisiNoteController::class, 'showData'])->name('supervisi-notes.show');
Route::get('supervisi-notes-single-pdf/{supervisi_note}', [\App\Http\Controllers\SupervisiNoteController::class, 'singlePdf'])->name('supervisi-notes.single-pdf');
Route::get('supervisi-notes/{supervisi_note}/edit', [\App\Http\Controllers\SupervisiNoteController::class, 'editData'])->name('supervisi-notes.edit');
Route::put('supervisi-notes/{supervisi_note}', [\App\Http\Controllers\SupervisiNoteController::class, 'updateData'])->name('supervisi-notes.update');
Route::delete('supervisi-notes/{supervisi_note}', [\App\Http\Controllers\SupervisiNoteController::class, 'destroyData'])->name('supervisi-notes.destroy');
Route::delete('supervisi-notes-using-checkbox', [\App\Http\Controllers\SupervisiNoteController::class, 'destroyUsingCheckbox'])->name('supervisi-notes.destroy-using-checkbox');
Route::delete('supervisi-notes-truncate', [\App\Http\Controllers\SupervisiNoteController::class, 'truncate'])->name('supervisi-notes.truncate');
// Route::resource('supervisi-notes', \App\Http\Controllers\SupervisiNoteController::class);
//route
        