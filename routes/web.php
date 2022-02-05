<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Teacher\DashboardController as TDashboardController;
use App\Http\Controllers\Teacher\SuratKeluarController as TSuratKeluarController;
use App\Http\Controllers\Teacher\SuratMasukController as TSuratMasukController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
})->name('start');

Route::get('/end', function () {
    Auth::guard('web')->logout();
    return redirect('/');
})->name('end');


Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::middleware(['teacher'])->group(function () {

        Route::prefix('teacher')->group(function () {
            Route::get('/dashboard', [TDashboardController::class, 'index'])->name('teacher');

            Route::prefix('surat-masuk')->group(function () {
                Route::get('/index', [TSuratMasukController::class, 'index'])->name('suratmasuk.index');
                Route::get('/read/{id}', [TSuratMasukController::class, 'read'])->name('suratmasuk.read');
            });
            Route::prefix('surat-keluar')->group(function () {
                Route::get('/index', [TSuratKeluarController::class, 'index'])->name('suratkeluar.index');
                Route::get('/read/{id}', [TSuratKeluarController::class, 'read'])->name('suratkeluar.read');
                Route::get('/delete/{id}', [TSuratKeluarController::class, 'delete'])->name('suratkeluar.delete');
                Route::post('/create', [TSuratKeluarController::class, 'create'])->name('suratkeluar.create');
            });
        });
    });
});
