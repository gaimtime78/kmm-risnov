<?php

use App\Http\Controllers\PostController;
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
    return redirect('/login');
});

// Route::get('/login', function () {
//     return view('auth/login');
// });

Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'index'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login.post');
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');



Route::get('/admin_pusat_list_dosen_aktif', function () {
    return view('/admin_pusat/ap_dosen_aktif/dosen_aktif_list');
})->name('admin_pusat_list_dosen_aktif');

/**
 * BAGIAN POST
 */
Route::name('admin.')->group(function () {
    Route::get('/admin/post', [PostController::class, 'index'])->name('post.index');
    Route::get('/admin/post/category/{id}', [PostController::class, 'category'])->name('post.category');
    Route::get('/admin/post/create', [PostController::class, 'create'])->name('post.create');
    Route::post('/admin/post', [PostController::class, 'store'])->name('post.store');
    Route::get('/admin/post/{id}/edit', [PostController::class, 'edit'])->name('post.edit');
    Route::put('/admin/post/{id}', [PostController::class, 'update'])->name('post.update');
    Route::delete('/admin/post/{id}', [PostController::class, 'delete'])->name('post.delete');
});


Route::get('/slider', [App\Http\Controllers\SliderController::class, 'index']);
Route::get('/slider/create', [App\Http\Controllers\SliderController::class, 'create']);
Route::post('/slider/upload', [App\Http\Controllers\SliderController::class, 'store']);
Route::post('/slider/view', [App\Http\Controllers\SliderController::class, 'view']);
