<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


/** Route ke halaman login  */
Route::get('/login', [AuthController::class, 'login'])->name('login');
/** Route ke halaman register  */
Route::get('/register', [AuthController::class, 'register'])->name('register');
/** Route untuk memeriksa autentikasi user */
Route::post('/login/authenticate', [AuthController::class, 'customLogin'])->name('login.authenticate'); 
/** Route untuk menyimpan data registrasi */
Route::post('/register/store', [AuthController::class, 'customRegister'])->name('register.store');
/** Route untuk logout */
Route::get('/logout', [AuthController::class, 'signOut'])->name('logout');


Route::middleware(['auth'])->group(function () {
    /** Route untuk menampilkan halaman home */
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    /** Route untuk menampilkan form upload postingan */
    Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
    /** Route untuk menyimpan inputan form postingan */
    Route::post('/post', [PostController::class, 'store'])->name('post.store');
    /** Route untuk melihat postingan */
    Route::get('/post/{id?}', [PostController::class, 'show'])->name('post.show');
    /** Route untuk memberi komentar postingan */
    Route::put('/comment/{id}', [PostController::class, 'comment'])->name('comment');

    /** Route untuk menampilkan profile user */  
    Route::get('/profile/{id?}', [ProfileController::class, 'show'])->name('profile.show');  
    /** Route untuk menampilkan form untuk mengedit profile tertentu. */
    Route::get('/profile/{id}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    /** Route untuk memperbarui data profile tertentu. */
    Route::put('/profile/{id}', [ProfileController::class, 'update'])->name('profile.update');
    // /** Route untuk menghapus suatu user */
    // Route::put('/profile/{id}', [ProfileController::class, 'destroy'])->name('profile.destroy');
});