<?php

use App\Http\Controllers\Backend\ArtikelController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Frontend\HomeController;
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

Route::GET('/', [HomeController::class, 'index'])->name('home');
Route::POST('addpengaduan', [HomeController::class, 'add'])->name('pengaduan.add');

Route::middleware(['auth', 'role:Admin'])->group(function(){
    Route::GET('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    Route::GET('/dashboard/users', [DashboardController::class, 'users'])->name('master.users');
    Route::POST('/dashboard/insertuser', [UserController::class, 'insert'])->name('master.insertuser');
    Route::PUT('/dashboard/updateuser/{id}', [UserController::class, 'update'])->name('master.updateuser');
    Route::GET('/dashboard/deleteuser/{id}', [UserController::class, 'delete'])->name('master.deleteuser');

    Route::GET('/dashboard/artikel', [DashboardController::class, 'artikel'])->name('content.artikel');
    Route::GET('/dashboard/addartikel', [ArtikelController::class, 'add'])->name('content.addartikel');
    Route::POST('/dashboard/insertartikel', [ArtikelController::class, 'insert'])->name('image.upload');
    Route::GET('/dashboard/deleteartikel/{id}', [ArtikelController::class, 'delete'])->name('content.deleteartikel');

    Route::GET('dashboard/pengaduan', [DashboardController::class, 'pengaduan'])->name('document.pengaduan');
});

require __DIR__.'/auth.php';
