<?php

use App\Http\Controllers\Teacher\SuratKeluarController;
use App\Http\Controllers\Teacher\SuratMasukController;
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


Route::get('teacher/surat-masuk/index/get/{id}', [SuratMasukController::class, 'getData'])->name('suratmasuk.index.get');
Route::get('teacher/surat-keluar/index/get/{id}', [SuratKeluarController::class, 'getData'])->name('suratkeluar.index.get');
