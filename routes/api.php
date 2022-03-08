<?php

use App\Http\Controllers\Admin\DispositionController as ADispositionController;
use App\Http\Controllers\Teacher\SuratKeluarController as TSuratKeluarController;
use App\Http\Controllers\Teacher\SuratMasukController as TSuratMasukController;
use App\Http\Controllers\Admin\SuratMasukController as ASuratMasukController;
use App\Http\Controllers\Headmaster\DispositionController as HDispositionController;
use App\Http\Controllers\Headmaster\SuratMasukController as HSuratMasukController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('teacher/surat-masuk/index/get/{id}', [TSuratMasukController::class, 'getData'])->name('teacher.suratmasuk.index.get');
Route::get('teacher/surat-keluar/index/get/{id}', [TSuratKeluarController::class, 'getData'])->name('teacher.suratkeluar.index.get');
Route::get('admin/surat-masuk/index/get', [ASuratMasukController::class, 'getData'])->name('admin.suratmasuk.index.get');
Route::get('admin/disposisi/index/get', [ADispositionController::class, 'getData'])->name('admin.disposisi.index.get');
Route::get('headmaster/surat-masuk/index/get/{id}', [HSuratMasukController::class, 'getData'])->name('headmaster.suratmasuk.index.get');
Route::get('headmaster/disposisi/index/get/{id}', [HDispositionController::class, 'getData'])->name('headmaster.disposisi.index.get');
