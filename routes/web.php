<?php

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
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('pendaftaran')->group(function () {

    // Member
    Route::middleware(['auth', 'verified'])->group(function () {
        Route::get('/member', [App\Http\Controllers\MemberController::class, 'index'])->name('get.member');
        Route::get('/member/tambah', [App\Http\Controllers\MemberController::class, 'tambah'])->name('get.tambah.member');
        Route::post('/member/tambah/proses', [App\Http\Controllers\MemberController::class, 'proses_tambah'])->name('post.proses-tambah.member');
        Route::get('/member/detail/{id}', [App\Http\Controllers\MemberController::class, 'detail'])->name('get.detail.member');
        Route::get('/member/ubah/{id}', [App\Http\Controllers\MemberController::class, 'ubah'])->name('get.ubah.member');
        Route::patch('/member/ubah/proses/{id}', [App\Http\Controllers\MemberController::class, 'proses_ubah'])->name('post.proses-ubah.member');
        Route::delete('/member/hapus/{id}', [App\Http\Controllers\MemberController::class, 'hapus'])->name('delete.member');
    });


    // Trainer
    Route::middleware(['auth', 'verified'])->group(function () {
        Route::get('/trainer', [App\Http\Controllers\TrainerController::class, 'index'])->name('get.trainer');
        Route::get('/trainer/tambah', [App\Http\Controllers\TrainerController::class, 'tambah'])->name('get.tambah.trainer');
        Route::post('/trainer/tambah/proses', [App\Http\Controllers\TrainerController::class, 'proses_tambah'])->name('post.proses-tambah.trainer');
        Route::get('/trainer/detail/{id}', [App\Http\Controllers\TrainerController::class, 'detail'])->name('get.detail.trainer');
        Route::get('/trainer/ubah/{id}', [App\Http\Controllers\TrainerController::class, 'ubah'])->name('get.ubah.trainer');
        Route::patch('/trainer/ubah/proses/{id}', [App\Http\Controllers\TrainerController::class, 'proses_ubah'])->name('post.proses-ubah.trainer');
        Route::delete('/trainer/hapus/{id}', [App\Http\Controllers\TrainerController::class, 'hapus'])->name('delete.trainer');
    });
});


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');
});
