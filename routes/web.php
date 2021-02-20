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

Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'index'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login.post');
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/admin_pusat_list_dosen_aktif', function () {
    return view('/admin_pusat/ap_dosen_aktif/dosen_aktif_list');
})->name('admin_pusat_list_dosen_aktif');


Route::get('/slider', [App\Http\Controllers\SliderController::class, 'index']);
Route::get('/slider/create', [App\Http\Controllers\SliderController::class, 'create']);
Route::post('/slider/upload', [App\Http\Controllers\SliderController::class, 'store']);
Route::post('/slider/view', [App\Http\Controllers\SliderController::class, 'view']);

Route::middleware(['auth:sanctum','RoleAuth'])->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
        
        Route::group(['prefix' => '/menu'], function(){
            Route::get('/', [App\Http\Controllers\Menu\MenuController::class, 'index'])->name('menu.index');
            Route::get('/create', [App\Http\Controllers\Menu\MenuController::class, 'add'])->name('menu.add');
            Route::post('/create', [App\Http\Controllers\Menu\MenuController::class, 'create'])->name('menu.create');
            Route::get('/edit/{id}', [App\Http\Controllers\Menu\MenuController::class, 'edit'])->name('menu.edit');
            Route::post('/edit/{id}', [App\Http\Controllers\Menu\MenuController::class, 'update'])->name('menu.update');
            Route::get('/delete/{id}', [App\Http\Controllers\Menu\MenuController::class, 'delete'])->name('menu.delete');
        });
        
        Route::group(['prefix' => '/category'], function(){
            Route::get('/', [App\Http\Controllers\CategoryController::class, 'index'])->name('category.index');
            Route::get('/create', [App\Http\Controllers\CategoryController::class, 'add'])->name('category.add');
            Route::post('/create', [App\Http\Controllers\CategoryController::class, 'create'])->name('category.create');
            Route::get('/edit/{id}', [App\Http\Controllers\CategoryController::class, 'edit'])->name('category.edit');
            Route::post('/edit/{id}', [App\Http\Controllers\CategoryController::class, 'update'])->name('category.update');
            Route::get('/delete/{id}', [App\Http\Controllers\CategoryController::class, 'delete'])->name('category.delete');
        });

        //
        Route::name('admin.')->group(function () {
            Route::get('/admin/post', [PostController::class, 'index'])->name('post.index');
            Route::get('/admin/post/category/{id}', [PostController::class, 'category'])->name('post.category');
            Route::get('/admin/post/create', [PostController::class, 'create'])->name('post.create');
            Route::post('/admin/post', [PostController::class, 'store'])->name('post.store');
            Route::get('/admin/post/{id}/edit', [PostController::class, 'edit'])->name('post.edit');
            Route::put('/admin/post/{id}', [PostController::class, 'update'])->name('post.update');
            Route::delete('/admin/post/{id}', [PostController::class, 'delete'])->name('post.delete');
        });

        // Route::group(['prefix' => '/posts'], function(){
        //     // Route::get('/', 'historyController@index')->name('history');
        //     // Route::get('/{id}', 'historyController@show');
        //     Route::get('/create', [App\Http\Controllers\Posts\PostsController::class, 'add'])->name('posts.add');
        //     Route::post('/create', [App\Http\Controllers\Posts\PostsController::class, 'create'])->name('posts.create');
        // });

        Route::get('/post', [PostController::class, 'index'])->name('post.index');
        Route::get('/post/category/{id}', [PostController::class, 'category'])->name('post.category');
        Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
        Route::post('/post', [PostController::class, 'store'])->name('post.store');
        Route::get('/post/{id}/edit', [PostController::class, 'edit'])->name('post.edit');
        Route::put('/post/{id}', [PostController::class, 'update'])->name('post.update');
        Route::delete('/post/{id}', [PostController::class, 'delete'])->name('post.delete');

        Route::group(['prefix' => '/page'], function(){
            Route::get('/', [App\Http\Controllers\PageController::class, 'index'])->name('page.index');
            Route::get('/create', [App\Http\Controllers\PageController::class, 'create'])->name('page.create');
            Route::post('/store', [App\Http\Controllers\PageController::class, 'store'])->name('page.store');
            Route::delete('/delete/{id}', [App\Http\Controllers\PageController::class, 'delete'])->name('page.delete');
        });

        
    });
});
//yg digunakan yg atas, selain yang diatas bisa ditambahkan, klo error merge   


Route::get('/index', [App\Http\Controllers\User\DashboardController::class, 'index']);
