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

Route::get('/', [App\Http\Controllers\User\HomeController::class, 'index'])->name('home');

// Route::get('/home', [App\Http\Controllers\User\HomeController::class, 'index'])->name('home');
Route::group(['prefix' => '/tentang-kami'], function(){
    Route::get('/sambutan', [App\Http\Controllers\User\TentangController::class, 'sambutan'])->name('tentang-kami.sambutan');
    Route::get('/visi-misi', [App\Http\Controllers\User\TentangController::class, 'visiMisi'])->name('tentang-kami.visiMisi');
    Route::get('/tugas-dan-fungsi', [App\Http\Controllers\User\TentangController::class, 'tugasFungsi'])->name('tentang-kami.tugasFungsi');
    Route::get('/rencana-strategis', [App\Http\Controllers\User\TentangController::class, 'rencanaStrategis'])->name('tentang-kami.rencanaStrategis');
    Route::get('/profil-biro-rpm', [App\Http\Controllers\User\TentangController::class, 'profilBiro'])->name('tentang-kami.profilBiro');
});
Route::get('/lppm', [App\Http\Controllers\User\LppmController::class, 'index'])->name('lppm');
Route::get('/direktorat-inovasi', [App\Http\Controllers\User\DirektoratInovasiController::class, 'index'])->name('direktorat');
Route::get('/informasi', [App\Http\Controllers\User\InformasiController::class, 'index'])->name('informasi');
Route::get('/pui', [App\Http\Controllers\User\PuiController::class, 'index'])->name('pui');

Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'index'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login.post');
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::get('/coming', function () {
    return view('user.coming');
})->name('coming');

Route::get('/admin_pusat_list_dosen_aktif', function () {
    return view('/admin_pusat/ap_dosen_aktif/dosen_aktif_list');
})->name('admin_pusat_list_dosen_aktif');

Route::group(['prefix' => '/mahasiswa-kkn'], function(){
    Route::get('/list', [App\Http\Controllers\User\MahasiswaKKNController::class, 'index'])->name('mahasiswa-kkn.list');
    Route::get('/nama', [App\Http\Controllers\User\MahasiswaKKNController::class, 'nama'])->name('mahasiswa-kkn.nama');
    Route::get('/nim', [App\Http\Controllers\User\MahasiswaKKNController::class, 'nim'])->name('mahasiswa-kkn.nim');
    Route::get('/jurusan', [App\Http\Controllers\User\MahasiswaKKNController::class, 'jurusan'])->name('mahasiswa-kkn.jurusan');
    Route::get('/provinsi-kkn', [App\Http\Controllers\User\MahasiswaKKNController::class, 'provinsiKKN'])->name('mahasiswa-kkn.provinsi-kkn');
    Route::get('/kabupaten-kkn', [App\Http\Controllers\User\MahasiswaKKNController::class, 'kabupatenKKN'])->name('mahasiswa-kkn.kabupaten-kkn');
    Route::get('/kecamatan-kkn', [App\Http\Controllers\User\MahasiswaKKNController::class, 'kecamatanKKN'])->name('mahasiswa-kkn.kecamatan-kkn');
    Route::get('/desa-kkn', [App\Http\Controllers\User\MahasiswaKKNController::class, 'desaKKN'])->name('mahasiswa-kkn.desa-kkn');
    Route::get('/foto-mahasiswa-kkn', [App\Http\Controllers\User\MahasiswaKKNController::class, 'FotoMahasiswaKKN'])->name('mahasiswa-kkn.foto-mahasiswa-kkn');
});

Route::get('/slider', [App\Http\Controllers\SliderController::class, 'index']);
Route::get('/slider/create', [App\Http\Controllers\SliderController::class, 'create']);
Route::post('/slider/upload', [App\Http\Controllers\SliderController::class, 'store']);
Route::post('/slider/view', [App\Http\Controllers\SliderController::class, 'view']);

Route::middleware(['auth:sanctum','RoleAuth'])->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
        
        Route::group(['as'=> 'menu.', 'prefix' => '/menu'], function(){
            Route::get('/', [App\Http\Controllers\Menu\MenuController::class, 'index'])->name('index');
            Route::get('/create', [App\Http\Controllers\Menu\MenuController::class, 'add'])->name('add');
            Route::post('/create', [App\Http\Controllers\Menu\MenuController::class, 'create'])->name('create');
            Route::get('/edit/{id}', [App\Http\Controllers\Menu\MenuController::class, 'edit'])->name('edit');
            Route::post('/edit/{id}', [App\Http\Controllers\Menu\MenuController::class, 'update'])->name('update');
            Route::get('/delete/{id}', [App\Http\Controllers\Menu\MenuController::class, 'delete'])->name('delete');
        });
        
        Route::group(['prefix' => '/category'], function(){
            Route::get('/', [App\Http\Controllers\CategoryController::class, 'index'])->name('category.index');
            Route::get('/create', [App\Http\Controllers\CategoryController::class, 'add'])->name('category.add');
            Route::post('/create', [App\Http\Controllers\CategoryController::class, 'create'])->name('category.create');
            Route::get('/edit/{id}', [App\Http\Controllers\CategoryController::class, 'edit'])->name('category.edit');
            Route::post('/edit/{id}', [App\Http\Controllers\CategoryController::class, 'update'])->name('category.update');
            Route::get('/delete/{id}', [App\Http\Controllers\CategoryController::class, 'delete'])->name('category.delete');
        });

        Route::group(['prefix' => '/post'], function(){
            Route::get('/', [PostController::class, 'index'])->name('post.index');
            Route::get('/category/{id}', [PostController::class, 'category'])->name('post.category');
            Route::get('/create', [PostController::class, 'create'])->name('post.create');
            Route::post('/store', [PostController::class, 'store'])->name('post.store');
            Route::get('/{id}/edit', [PostController::class, 'edit'])->name('post.edit');
            Route::put('/{id}', [PostController::class, 'update'])->name('post.update');
            Route::delete('/{id}', [PostController::class, 'delete'])->name('post.delete');
        });

        Route::group(['prefix' => '/banner'], function(){
            Route::get('/', [App\Http\Controllers\BannerController::class, 'index'])->name('banner.index');
            Route::get('/create', [App\Http\Controllers\BannerController::class, 'create'])->name('banner.create');
            Route::post('/store', [App\Http\Controllers\BannerController::class, 'store'])->name('banner.store');
            Route::get('/{id}/edit', [App\Http\Controllers\BannerController::class, 'edit'])->name('banner.edit');
            Route::put('/{id}', [App\Http\Controllers\BannerController::class, 'update'])->name('banner.update');
            Route::put('/{id}/status', [App\Http\Controllers\BannerController::class, 'updateStatus'])->name('banner.updatestatus');
            Route::delete('/{id}', [App\Http\Controllers\BannerController::class, 'delete'])->name('banner.delete');
        });

        Route::group(['prefix' => '/page'], function(){
            Route::get('/', [App\Http\Controllers\PageController::class, 'index'])->name('page.index');
            Route::get('/create', [App\Http\Controllers\PageController::class, 'create'])->name('page.create');
            Route::post('/store', [App\Http\Controllers\PageController::class, 'store'])->name('page.store');
            Route::get('/edit/{id}', [App\Http\Controllers\PageController::class, 'edit'])->name('page.edit');
            Route::put('/update/{id}', [App\Http\Controllers\PageController::class, 'update'])->name('page.update');
            Route::delete('/delete/{id}', [App\Http\Controllers\PageController::class, 'delete'])->name('page.delete');
        });

        
    });
});
//yg digunakan yg atas, selain yang diatas bisa ditambahkan, klo error merge   


Route::get('/index', [App\Http\Controllers\User\DashboardController::class, 'index']);
Route::get('/get_menu', [App\Http\Controllers\User\DashboardController::class, 'get_menu']);
Route::get('/page/{slug}', [App\Http\Controllers\PageController::class, 'blog'])->name('page.blog');
Route::get('/produk-penelitian', [App\Http\Controllers\User\ProdukController::class, 'penelitian'])->name('produk-penelitian');
Route::get('/produk-pengabdian', [App\Http\Controllers\User\ProdukController::class, 'pengabdian'])->name('produk-pengabdian');
Route::get('/berita-terkini', [App\Http\Controllers\User\BeritaController::class, 'index'])->name('berita-terkini');
Route::get('/agenda', [App\Http\Controllers\User\AgendaController::class, 'index'])->name('agenda');
Route::get('/produk-komersial', [App\Http\Controllers\User\ProdukController::class, 'index'])->name('produk-komersial');
Route::get('/gallery', [App\Http\Controllers\User\GalleryController::class, 'index'])->name('gallery');
Route::get('/get_gallery', [App\Http\Controllers\User\HomeController::class, 'get_gallery'])->name('get_gallery');
Route::get('/post/{slug}', [App\Http\Controllers\PostController::class, 'detail'])->name('detail-post');
Route::get('/search', [App\Http\Controllers\PostController::class, 'search'])->name('search');
Route::get('/category/{category}', [App\Http\Controllers\PostController::class, 'searchKategory'])->name('category');

// Route::get('/njajal', function () {
//     dd(\App\Models\Post::find(1)->category[0]->category);
// });