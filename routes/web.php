<?php

use App\Http\Controllers\FileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FileController::class, 'index']);
Route::get('/storage_local_create', [FileController::class, 'storageLocalCreate'])->name('storage.local.create');
Route::get('/storage_local_append', [FileController::class, 'storageLocalAppend'])->name('storage.local.append');
Route::get('/storage_local_read', [FileController::class, 'storageLocalRead'])->name('storage.local.read');
Route::get('/storage_local_read_multi', [FileController::class, 'storageLocalReadMulti'])->name('storage.local.read.multi');
Route::get('/storage_local_check_file', [FileController::class, 'storageLocalCheckFile'])->name('storage.local.check.file');
Route::get('/storage_local_store_json', [FileController::class, 'storeJson'])->name('storage.local.store.json');
Route::get('/storage_local_read_json', [FileController::class, 'readJson'])->name('storage.local.read_json');
Route::get('/storage_local_list', [FileController::class, 'listFiles'])->name('storage.local.list_files');
Route::get('/storage_local_delete', [FileController::class, 'deleteFile'])->name('storage.local.delete_file');

// folders
Route::get('/storage_local_create_folder', [FileController::class, 'createFolder'])->name('storage.local.create.folder');
Route::get('/storage_local_delete_folder', [FileController::class, 'deleteFolder'])->name('storage.local.delete.folder');
