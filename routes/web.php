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
    return redirect('/login');
});

// Route::get('/login', function () {
//     return view('auth/login');
// });

Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'index'])->name('login.index');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login.post');
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/admin_pusat_list_dosen_aktif', function () {
    return view('/admin_pusat/ap_dosen_aktif/dosen_aktif_list');
})->name('admin_pusat_list_dosen_aktif');

Route::group(['prefix' => '/posts'], function(){
    // Route::get('/', 'historyController@index')->name('history');
    // Route::get('/{id}', 'historyController@show');
    Route::get('/create', [App\Http\Controllers\Posts\PostsController::class, 'add'])->name('posts.add');
    Route::post('/create', [App\Http\Controllers\Posts\PostsController::class, 'create'])->name('posts.create');
});

//belom diberi middleware admin
Route::group(['prefix' => '/menu'], function(){
    Route::get('/', [App\Http\Controllers\Menu\MenuController::class, 'index'])->name('menu.index');
    Route::get('/create', [App\Http\Controllers\Menu\MenuController::class, 'add'])->name('menu.add');
    Route::post('/create', [App\Http\Controllers\Menu\MenuController::class, 'create'])->name('menu.create');
    Route::get('/edit/{id}', [App\Http\Controllers\Menu\MenuController::class, 'edit'])->name('menu.edit');
    Route::post('/edit/{id}', [App\Http\Controllers\Menu\MenuController::class, 'update'])->name('menu.update');
    Route::get('/delete/{id}', [App\Http\Controllers\Menu\MenuController::class, 'delete'])->name('menu.delete');
});

//
Route::name('admin.')->group(function () {
});

Route::get('/slider', [App\Http\Controllers\SliderController::class, 'index']);
Route::get('/slider/create', [App\Http\Controllers\SliderController::class, 'create']);
Route::post('/slider/upload', [App\Http\Controllers\SliderController::class, 'store']);
Route::post('/slider/view', [App\Http\Controllers\SliderController::class, 'view']);
