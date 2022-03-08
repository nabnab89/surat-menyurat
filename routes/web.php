<?php

use App\Http\Controllers\Admin\DashboardController as ADashboardController;
use App\Http\Controllers\Admin\DispositionController as ADispositionController;
use App\Http\Controllers\Admin\SuratMasukController as ASuratMasukController;
use App\Http\Controllers\Headmaster\DashboardController as HDashboardController;
use App\Http\Controllers\Headmaster\DispositionController as HDispositionController;
use App\Http\Controllers\Headmaster\SuratMasukController as HSuratMasukController;
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
                Route::get('/index', [TSuratMasukController::class, 'index'])->name('teacher.suratmasuk.index');
                Route::get('/read/{id}', [TSuratMasukController::class, 'read'])->name('teacher.suratmasuk.read');
            });
            Route::prefix('surat-keluar')->group(function () {
                Route::get('/index', [TSuratKeluarController::class, 'index'])->name('teacher.suratkeluar.index');
                Route::get('/read/{id}', [TSuratKeluarController::class, 'read'])->name('teacher.suratkeluar.read');
                Route::get('/delete/{id}', [TSuratKeluarController::class, 'delete'])->name('teacher.suratkeluar.delete');
                Route::post('/create', [TSuratKeluarController::class, 'create'])->name('teacher.suratkeluar.create');
            });
        });
    });
    Route::middleware(['admin'])->group(function () {
        Route::prefix('admin')->group(function () {
            Route::get('/dashboard', [ADashboardController::class, 'index'])->name('admin');

            Route::prefix('surat-masuk')->group(function () {
                Route::get('/index', [ASuratMasukController::class, 'index'])->name('admin.suratmasuk.index');
                Route::get('/read/{id}', [ASuratMasukController::class, 'read'])->name('admin.suratmasuk.read');
                Route::post('/create', [ASuratMasukController::class, 'create'])->name('admin.suratmasuk.create');
                Route::get('/delete/{id}', [ASuratMasukController::class, 'delete'])->name('admin.suratmasuk.delete');
            });

            Route::prefix('disposisi')->group(function () {
                Route::get('/index', [ADispositionController::class, 'index'])->name('admin.disposisi.index');
                Route::get('/read/{id}', [ADispositionController::class, 'read'])->name('admin.disposisi.read');
            });
        });
    });
    Route::middleware(['headmaster'])->group(function () {
        Route::prefix('headmaster')->group(function () {
            Route::get('/dashboard', [HDashboardController::class, 'index'])->name('headmaster');

            Route::prefix('surat-masuk')->group(function () {
                Route::get('/index', [HSuratMasukController::class, 'index'])->name('headmaster.suratmasuk.index');
                Route::get('/read/{id}', [HSuratMasukController::class, 'read'])->name('headmaster.suratmasuk.read');
            });

            Route::prefix('disposisi')->group(function () {
                Route::get('/index', [HDispositionController::class, 'index'])->name('headmaster.disposisi.index');
                Route::get('/read/{id}', [HDispositionController::class, 'read'])->name('headmaster.disposisi.read');
                Route::get('/acc/{id}', [HDispositionController::class, 'acc'])->name('headmaster.disposisi.acc');
                Route::get('/not_acc/{id}', [HDispositionController::class, 'not_acc'])->name('headmaster.disposisi.not_acc');
                Route::post('/edit/{id}', [HDispositionController::class, 'edit'])->name('headmaster.disposisi.edit');
            });
        });
    });
});
