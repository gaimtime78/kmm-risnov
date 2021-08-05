<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\KoranController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes --
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [App\Http\Controllers\User\HomeController::class, 'index'])->name('home');
Route::get('/ruang', [App\Http\Controllers\User\HomeController::class, 'ruang'])->name('ruang');

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
Route::get('/dokumentasi', [App\Http\Controllers\User\DokumentasiController::class, 'index'])->name('dokumentasi');
Route::get('/pui', [App\Http\Controllers\User\PuiController::class, 'index'])->name('pui');

Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'index'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login.post');
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::get('/coming', function () {
    return view('user.coming');
})->name('coming');

Route::get('/admin_pusat_list_dosen_aktif', function () {
    return view('/admin_pusat/ap_dosen_aktif/dosen_aktif_list');
})->name('admin_pusat_list_dosen_aktif');

Route::group(['prefix' => '/mahasiswa-kkn'], function(){
    Route::get('/detail-mahasiswa-kkn', [App\Http\Controllers\User\MahasiswaKKNController::class, 'detail'])->name('mahasiswa-kkn.detail');
    Route::get('/', [App\Http\Controllers\User\MahasiswaKKNController::class, 'index'])->name('mahasiswa-kkn.index');

});

Route::get('/slider', [App\Http\Controllers\SliderController::class, 'index']);
Route::get('/slider/create', [App\Http\Controllers\SliderController::class, 'create']);
Route::post('/slider/upload', [App\Http\Controllers\SliderController::class, 'store']);
Route::post('/slider/view', [App\Http\Controllers\SliderController::class, 'view']);

Route::middleware(['auth:sanctum','RoleAuth'])->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
        
        Route::group(['as'=> 'menu.', 'prefix' => '/menu'], function(){
            Route::get('/', [App\Http\Controllers\Menu\MenuController::class, 'index'])->name('index');
            Route::get('/create', [App\Http\Controllers\Menu\MenuController::class, 'add'])->name('add');
            Route::post('/create', [App\Http\Controllers\Menu\MenuController::class, 'create'])->name('create');
            Route::get('/edit/{id}', [App\Http\Controllers\Menu\MenuController::class, 'edit'])->name('edit');
            Route::post('/edit/{id}', [App\Http\Controllers\Menu\MenuController::class, 'update'])->name('update');
            Route::get('/delete/{id}', [App\Http\Controllers\Menu\MenuController::class, 'delete'])->name('delete');
        });

        
        Route::group(['as'=> 'penelitipengabdi.', 'prefix' => '/penelitipengabdi'], function(){
            Route::get('/', [App\Http\Controllers\Rida\RidaController::class, 'index'])->name('index');
            Route::get('/pilihperiode/{fakultas}', [App\Http\Controllers\Rida\RidaController::class, 'pilihperiode'])->name('pilihperiode');
            Route::get('/details/{nama_fakultas}/{periode}/{tahun_input}', [App\Http\Controllers\Rida\RidaController::class, 'details'])->name('details');
            Route::get('/create', [App\Http\Controllers\Rida\RidaController::class, 'add'])->name('add');
            Route::post('/create', [App\Http\Controllers\Rida\RidaController::class, 'create'])->name('create');
            Route::get('/edit/{id}', [App\Http\Controllers\Rida\RidaController::class, 'edit'])->name('edit');
            Route::post('/edit/{id}', [App\Http\Controllers\Rida\RidaController::class, 'update'])->name('update');
            Route::get('/delete/{id}', [App\Http\Controllers\Rida\RidaController::class, 'delete'])->name('delete');
            Route::get('/export', [App\Http\Controllers\Rida\RidaController::class, 'export'])->name('export');
            Route::post('/import', [App\Http\Controllers\Rida\RidaController::class, 'import'])->name('import');
        });

        Route::group(['as'=> 'penelitipengabdimagister.', 'prefix' => '/penelitipengabdimagister'], function(){
            Route::get('/', [App\Http\Controllers\Rida\MagisterController::class, 'index'])->name('index');
            Route::get('/details/{fakultas}', [App\Http\Controllers\Rida\MagisterController::class, 'details'])->name('details');
            Route::get('/create', [App\Http\Controllers\Rida\MagisterController::class, 'add'])->name('add');
            Route::post('/create', [App\Http\Controllers\Rida\MagisterController::class, 'create'])->name('create');
            Route::get('/edit/{id}', [App\Http\Controllers\Rida\MagisterController::class, 'edit'])->name('edit');
            Route::post('/edit/{id}', [App\Http\Controllers\Rida\MagisterController::class, 'update'])->name('update');
            Route::get('/delete/{id}', [App\Http\Controllers\Rida\MagisterController::class, 'delete'])->name('delete');
            Route::get('/export', [App\Http\Controllers\Rida\MagisterController::class, 'export'])->name('export');
            Route::post('/import', [App\Http\Controllers\Rida\MagisterController::class, 'import'])->name('import');
        });

        Route::group(['as'=> 'penelitipengabdispesialis.', 'prefix' => '/penelitipengabdispesialis'], function(){
            Route::get('/', [App\Http\Controllers\Rida\SpesialisController::class, 'index'])->name('index');
            Route::get('/details/{fakultas}', [App\Http\Controllers\Rida\SpesialisController::class, 'details'])->name('details');
            Route::get('/create', [App\Http\Controllers\Rida\SpesialisController::class, 'add'])->name('add');
            Route::post('/create', [App\Http\Controllers\Rida\SpesialisController::class, 'create'])->name('create');
            Route::get('/edit/{id}', [App\Http\Controllers\Rida\SpesialisController::class, 'edit'])->name('edit');
            Route::post('/edit/{id}', [App\Http\Controllers\Rida\SpesialisController::class, 'update'])->name('update');
            Route::get('/delete/{id}', [App\Http\Controllers\Rida\SpesialisController::class, 'delete'])->name('delete');
            Route::get('/export', [App\Http\Controllers\Rida\SpesialisController::class, 'export'])->name('export');
            Route::post('/import', [App\Http\Controllers\Rida\SpesialisController::class, 'import'])->name('import');
        });

        Route::group(['as'=> 'penelitipengabdispesialiskonsultan.', 'prefix' => '/penelitipengabdispesialiskonsultan'], function(){
            Route::get('/', [App\Http\Controllers\Rida\SpesialisKonsultanController::class, 'index'])->name('index');
            Route::get('/details/{fakultas}', [App\Http\Controllers\Rida\SpesialisKonsultanController::class, 'details'])->name('details');
            Route::get('/create', [App\Http\Controllers\Rida\SpesialisKonsultanController::class, 'add'])->name('add');
            Route::post('/create', [App\Http\Controllers\Rida\SpesialisKonsultanController::class, 'create'])->name('create');
            Route::get('/edit/{id}', [App\Http\Controllers\Rida\SpesialisKonsultanController::class, 'edit'])->name('edit');
            Route::post('/edit/{id}', [App\Http\Controllers\Rida\SpesialisKonsultanController::class, 'update'])->name('update');
            Route::get('/delete/{id}', [App\Http\Controllers\Rida\SpesialisKonsultanController::class, 'delete'])->name('delete');
            Route::get('/export', [App\Http\Controllers\Rida\SpesialisKonsultanController::class, 'export'])->name('export');
            Route::post('/import', [App\Http\Controllers\Rida\SpesialisKonsultanController::class, 'import'])->name('import');
        });

        Route::group(['as'=> 'penelitipengabdispesialis1.', 'prefix' => '/penelitipengabdispesialis1'], function(){
            Route::get('/', [App\Http\Controllers\Rida\Spesialis1Controller::class, 'index'])->name('index');
            Route::get('/details/{fakultas}', [App\Http\Controllers\Rida\Spesialis1Controller::class, 'details'])->name('details');
            Route::get('/create', [App\Http\Controllers\Rida\Spesialis1Controller::class, 'add'])->name('add');
            Route::post('/create', [App\Http\Controllers\Rida\Spesialis1Controller::class, 'create'])->name('create');
            Route::get('/edit/{id}', [App\Http\Controllers\Rida\Spesialis1Controller::class, 'edit'])->name('edit');
            Route::post('/edit/{id}', [App\Http\Controllers\Rida\Spesialis1Controller::class, 'update'])->name('update');
            Route::get('/delete/{id}', [App\Http\Controllers\Rida\Spesialis1Controller::class, 'delete'])->name('delete');
            Route::get('/export', [App\Http\Controllers\Rida\Spesialis1Controller::class, 'export'])->name('export');
            Route::post('/import', [App\Http\Controllers\Rida\Spesialis1Controller::class, 'import'])->name('import');
        });
        

        Route::group(['as'=> 'penelitipengabdiprofesi.', 'prefix' => '/penelitipengabdiprofesi'], function(){
            Route::get('/', [App\Http\Controllers\Rida\ProfesiController::class, 'index'])->name('index');
            Route::get('/details/{fakultas}', [App\Http\Controllers\Rida\ProfesiController::class, 'details'])->name('details');
            Route::get('/create', [App\Http\Controllers\Rida\ProfesiController::class, 'add'])->name('add');
            Route::post('/create', [App\Http\Controllers\Rida\ProfesiController::class, 'create'])->name('create');
            Route::get('/edit/{id}', [App\Http\Controllers\Rida\ProfesiController::class, 'edit'])->name('edit');
            Route::post('/edit/{id}', [App\Http\Controllers\Rida\ProfesiController::class, 'update'])->name('update');
            Route::get('/delete/{id}', [App\Http\Controllers\Rida\ProfesiController::class, 'delete'])->name('delete');
            Route::get('/export', [App\Http\Controllers\Rida\ProfesiController::class, 'export'])->name('export');
            Route::post('/import', [App\Http\Controllers\Rida\ProfesiController::class, 'import'])->name('import');
        });
        
        Route::group(['as'=> 'indekspenelitipkm.', 'prefix' => '/indekspenelitipkm'], function(){
            Route::get('/', [App\Http\Controllers\Rida\IndeksPenelitiPKMController::class, 'index'])->name('index');
            Route::get('/details/{periode}/{tahun_input}', [App\Http\Controllers\Rida\IndeksPenelitiPKMController::class, 'details'])->name('details');
            Route::get('/create', [App\Http\Controllers\Rida\IndeksPenelitiPKMController::class, 'add'])->name('add');
            Route::post('/create', [App\Http\Controllers\Rida\IndeksPenelitiPKMController::class, 'create'])->name('create');
            Route::get('/edit/{id}', [App\Http\Controllers\Rida\IndeksPenelitiPKMController::class, 'edit'])->name('edit');
            Route::post('/edit/{id}', [App\Http\Controllers\Rida\IndeksPenelitiPKMController::class, 'update'])->name('update');
            Route::get('/delete/{id}', [App\Http\Controllers\Rida\IndeksPenelitiPKMController::class, 'delete'])->name('delete');
            Route::get('/export', [App\Http\Controllers\Rida\IndeksPenelitiPKMController::class, 'export'])->name('export');
            Route::post('/import', [App\Http\Controllers\Rida\IndeksPenelitiPKMController::class, 'import'])->name('import');
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

        Route::group(['prefix' => '/koran'], function(){
            Route::get('/', [KoranController::class, 'index'])->name('koran.index');
            Route::get('/category/{id}', [KoranController::class, 'category'])->name('koran.category');
            Route::get('/create', [KoranController::class, 'create'])->name('koran.create');
            Route::post('/store', [KoranController::class, 'store'])->name('koran.store');
            Route::get('/{id}/edit', [KoranController::class, 'edit'])->name('koran.edit');
            Route::put('/{id}', [KoranController::class, 'update'])->name('koran.update');
            Route::delete('/{id}', [KoranController::class, 'delete'])->name('koran.delete');
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

        Route::group(['prefix' => '/user'], function(){
            Route::get('/', [App\Http\Controllers\UserController::class, 'index'])->name('user.index');
            Route::get('/create', [App\Http\Controllers\UserController::class, 'create'])->name('user.create');
            Route::post('/store', [App\Http\Controllers\UserController::class, 'store'])->name('user.store');
            Route::get('/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
            Route::put('/update/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');
            Route::delete('/delete/{id}', [App\Http\Controllers\UserController::class, 'delete'])->name('user.delete');
        });

        Route::group(['prefix' => '/permission'], function(){
            Route::get('/', [App\Http\Controllers\PermissionController::class, 'index'])->name('permission.index');
            Route::get('/create', [App\Http\Controllers\PermissionController::class, 'create'])->name('permission.create');
            Route::post('/store', [App\Http\Controllers\PermissionController::class, 'store'])->name('permission.store');
            Route::get('/edit/{id}', [App\Http\Controllers\PermissionController::class, 'edit'])->name('permission.edit');
            Route::put('/update/{id}', [App\Http\Controllers\PermissionController::class, 'update'])->name('permission.update');
            Route::get('/delete/{id}', [App\Http\Controllers\PermissionController::class, 'delete'])->name('permission.delete');
        });

        Route::group(['prefix' => '/agenda'], function(){
            Route::get('/', [App\Http\Controllers\AgendaController::class, 'index'])->name('agenda.index');
            Route::get('/create', [App\Http\Controllers\AgendaController::class, 'create'])->name('agenda.create');
            Route::post('/store', [App\Http\Controllers\AgendaController::class, 'store'])->name('agenda.store');
            Route::get('/edit/{id}', [App\Http\Controllers\AgendaController::class, 'edit'])->name('agenda.edit');
            Route::post('/update/{id}', [App\Http\Controllers\AgendaController::class, 'update'])->name('agenda.update');
            Route::delete('/delete/{id}', [App\Http\Controllers\AgendaController::class, 'delete'])->name('agenda.delete');
            Route::get('/export', [App\Http\Controllers\AgendaController::class, 'export'])->name('agenda.export');
            Route::post('/import', [App\Http\Controllers\AgendaController::class, 'import'])->name('agenda.import');
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
Route::get('/agenda/{slug}', [App\Http\Controllers\User\AgendaController::class, 'detail'])->name('detail-agenda');
Route::get('/get_agendas', [App\Http\Controllers\User\AgendaController::class, 'getAgendas'])->name('get_agendas');
Route::get('/produk-komersial', [App\Http\Controllers\User\ProdukController::class, 'index'])->name('produk-komersial');
Route::get('/gallery', [App\Http\Controllers\User\GalleryController::class, 'index'])->name('gallery');
Route::get('/get_gallery', [App\Http\Controllers\User\HomeController::class, 'get_gallery'])->name('get_gallery');
Route::get('/post/{slug}', [App\Http\Controllers\PostController::class, 'detail'])->name('detail-post');
Route::get('/koran/{slug}', [App\Http\Controllers\KoranController::class, 'detail'])->name('detail-koran');
Route::get('/search', [App\Http\Controllers\PostController::class, 'search'])->name('search');
Route::get('/koran_search', [App\Http\Controllers\KoranController::class, 'search'])->name('koran-search');
Route::get('/category/{category}', [App\Http\Controllers\PostController::class, 'searchKategory'])->name('category');

// Route::get('/njajal', function () {
//     dd(\App\Models\Post::find(1)->category[0]->category);
// });

Route::get('/{slug}', [App\Http\Controllers\User\LppmController::class, 'page'])->name('userpage');
Route::get('/{slug}/{sub}', [App\Http\Controllers\User\LppmController::class, 'submenu'])->name('subs');