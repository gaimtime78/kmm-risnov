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
Route::group(['prefix' => '/tentang-kami'], function () {
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

Route::group(['prefix' => '/mahasiswa-kkn'], function () {
    Route::get('/detail-mahasiswa-kkn', [App\Http\Controllers\User\MahasiswaKKNController::class, 'detail'])->name('mahasiswa-kkn.detail');
    Route::get('/', [App\Http\Controllers\User\MahasiswaKKNController::class, 'index'])->name('mahasiswa-kkn.index');
});

Route::get('/slider', [App\Http\Controllers\SliderController::class, 'index']);
Route::get('/slider/create', [App\Http\Controllers\SliderController::class, 'create']);
Route::post('/slider/upload', [App\Http\Controllers\SliderController::class, 'store']);
Route::post('/slider/view', [App\Http\Controllers\SliderController::class, 'view']);

Route::middleware(['auth:sanctum', 'RoleAuth'])->group(function () {
    Route::get('/dokumentasi-rida', [App\Http\Controllers\User\RidaController::class, 'index'])->name('dokumentasi-rida');
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

        Route::group(['as' => 'menu.', 'prefix' => '/menu'], function () {
            Route::get('/', [App\Http\Controllers\Menu\MenuController::class, 'index'])->name('index');
            Route::get('/create', [App\Http\Controllers\Menu\MenuController::class, 'add'])->name('add');
            Route::post('/create', [App\Http\Controllers\Menu\MenuController::class, 'create'])->name('create');
            Route::get('/edit/{id}', [App\Http\Controllers\Menu\MenuController::class, 'edit'])->name('edit');
            Route::post('/edit/{id}', [App\Http\Controllers\Menu\MenuController::class, 'update'])->name('update');
            Route::get('/delete/{id}', [App\Http\Controllers\Menu\MenuController::class, 'delete'])->name('delete');
        });

        Route::group(['as' => 'capaian_iku.', 'prefix' => '/capaian_iku'], function () {
            Route::get('/', [App\Http\Controllers\Rida\IkuController::class, 'index'])->name('index');
            Route::get('/pilihperiode/{target_capaian}', [App\Http\Controllers\Rida\IkuController::class, 'pilihperiode'])->name('pilihperiode');
            Route::get('/details/{target_capaian}/{periode}/{tahun_input}', [App\Http\Controllers\Rida\IkuController::class, 'details'])->name('details');
            Route::get('/create', [App\Http\Controllers\Rida\IkuController::class, 'add'])->name('add');
            Route::post('/create', [App\Http\Controllers\Rida\IkuController::class, 'create'])->name('create');
            Route::get('/edit/{id}', [App\Http\Controllers\Rida\IkuController::class, 'edit'])->name('edit');
            Route::post('/edit/{target}/{periode}/{tahun_input}/{sumber_data}', [App\Http\Controllers\Rida\IkuController::class, 'update'])->name('update');
            Route::get('/delete/{nama_fakultas}/{periode}/{tahun_input}', [App\Http\Controllers\Rida\IkuController::class, 'delete'])->name('delete');
            Route::get('/export', [App\Http\Controllers\Rida\IkuController::class, 'export'])->name('export');
            Route::post('/import', [App\Http\Controllers\Rida\IkuController::class, 'import'])->name('import');
        });

        Route::group(['as' => 'hibahpnbp.', 'prefix' => '/hibahpnbp'], function () {
            Route::get('/', [App\Http\Controllers\Rida\HibahPNBPController::class, 'index'])->name('index');
            Route::get('/pilihperiode/{target_capaian}', [App\Http\Controllers\Rida\HibahPNBPController::class, 'pilihperiode'])->name('pilihperiode');
            Route::get('/details/{periode}/{tahun_input}', [App\Http\Controllers\Rida\HibahPNBPController::class, 'details'])->name('details');
            Route::get('/create', [App\Http\Controllers\Rida\HibahPNBPController::class, 'add'])->name('add');
            Route::post('/create', [App\Http\Controllers\Rida\HibahPNBPController::class, 'create'])->name('create');
            Route::get('/edit/{id}', [App\Http\Controllers\Rida\HibahPNBPController::class, 'edit'])->name('edit');
            Route::post('/edit/{target}/{periode}/{tahun_input}/{sumber_data}', [App\Http\Controllers\Rida\HibahPNBPController::class, 'update'])->name('update');
            Route::get('/delete/{periode}/{tahun_input}', [App\Http\Controllers\Rida\HibahPNBPController::class, 'delete'])->name('delete');
            Route::get('/export', [App\Http\Controllers\Rida\HibahPNBPController::class, 'export'])->name('export');
            Route::post('/import', [App\Http\Controllers\Rida\HibahPNBPController::class, 'import'])->name('import');
        });

        Route::group(['as' => 'skemapnbp.', 'prefix' => '/skemapnbp'], function () {
            Route::get('/', [App\Http\Controllers\Rida\SkemaPNBPController::class, 'index'])->name('index');

            Route::get('/pilihperiode/{target_capaian}', [App\Http\Controllers\Rida\SkemaPNBPController::class, 'pilihperiode'])->name('pilihperiode');
            Route::get('/details/{periode}/{tahun_input}', [App\Http\Controllers\Rida\SkemaPNBPController::class, 'details'])->name('details');
            Route::get('/details/{skema}/{periode}/{tahun_input}', [App\Http\Controllers\Rida\SkemaPNBPController::class, 'detailsSkema'])->name('details-skema');
            Route::get('/details-5tahun/', [App\Http\Controllers\Rida\SkemaPNBPController::class, 'detailsSkema5Tahun'])->name('details-5tahun');
            Route::get('/details-5tahun/jenisSkema/{skema}', [App\Http\Controllers\Rida\SkemaPNBPController::class, 'detailsSkemaFakultas5Tahun'])->name('details-skemaFakultas5tahun');
            Route::get('/details-5tahun/jenisSkema/{skema}/', [App\Http\Controllers\Rida\SkemaPNBPController::class, 'detailsSkemaFakultas5Tahun'])->name('details-skemaFakultas5tahun');
            
            Route::get('/create', [App\Http\Controllers\Rida\SkemaPNBPController::class, 'add'])->name('add');
            Route::post('/create', [App\Http\Controllers\Rida\SkemaPNBPController::class, 'create'])->name('create');
            Route::get('/edit/{id}', [App\Http\Controllers\Rida\SkemaPNBPController::class, 'edit'])->name('edit');
            Route::post('/edit/{target}/{periode}/{tahun_input}/{sumber_data}', [App\Http\Controllers\Rida\SkemaPNBPController::class, 'update'])->name('update');
            Route::get('/delete/{nama_fakultas}/{periode}/{tahun_input}', [App\Http\Controllers\Rida\SkemaPNBPController::class, 'delete'])->name('delete');
            Route::get('/export', [App\Http\Controllers\Rida\SkemaPNBPController::class, 'export'])->name('export');
            Route::post('/import', [App\Http\Controllers\Rida\SkemaPNBPController::class, 'import'])->name('import');
            Route::post('/editPeriode', [App\Http\Controllers\Rida\SkemaPNBPController::class, 'editPeriode'])->name('edit-periode');
            Route::post('/editJumlah', [App\Http\Controllers\Rida\SkemaPNBPController::class, 'editJumlah'])->name('edit-jumlah');
            Route::post('/deletePeriode', [App\Http\Controllers\Rida\SkemaPNBPController::class, 'deletePeriode'])->name('delete-periode');
        });

        Route::group(['as' => 'penelitipengabdi.', 'prefix' => '/penelitipengabdi'], function () {
            Route::get('/', [App\Http\Controllers\Rida\RidaController::class, 'index'])->name('index');
            Route::get('/pilihperiode/{fakultas}', [App\Http\Controllers\Rida\RidaController::class, 'pilihperiode'])->name('pilihperiode');
            Route::get('/details/{nama_fakultas}/{periode}/{tahun_input}', [App\Http\Controllers\Rida\RidaController::class, 'details'])->name('details');
            Route::get('/create', [App\Http\Controllers\Rida\RidaController::class, 'add'])->name('add');
            Route::post('/create', [App\Http\Controllers\Rida\RidaController::class, 'create'])->name('create');
            Route::get('/edit/{id}', [App\Http\Controllers\Rida\RidaController::class, 'edit'])->name('edit');
            Route::post('/edit/{nama_fakultas}/{periode}/{tahun_input}/{sumber_data}', [App\Http\Controllers\Rida\RidaController::class, 'update'])->name('update');
            Route::get('/delete/{nama_fakultas}/{periode}/{tahun_input}', [App\Http\Controllers\Rida\RidaController::class, 'delete'])->name('delete');
            Route::get('/export', [App\Http\Controllers\Rida\RidaController::class, 'export'])->name('export');
            Route::post('/import', [App\Http\Controllers\Rida\RidaController::class, 'import'])->name('import');
            Route::post('/updaterow/{id}', [App\Http\Controllers\Rida\RidaController::class, 'updateRow'])->name('updaterow');
        });

        Route::group(['as' => 'penelitipengabdimagister.', 'prefix' => '/penelitipengabdimagister'], function () {
            Route::get('/', [App\Http\Controllers\Rida\MagisterController::class, 'index'])->name('index');
            Route::get('/pilihperiode/{fakultas}', [App\Http\Controllers\Rida\MagisterController::class, 'pilihperiode'])->name('pilihperiode');
            Route::get('/details/{nama_fakultas}/{periode}/{tahun_input}', [App\Http\Controllers\Rida\MagisterController::class, 'details'])->name('details');
            Route::get('/create', [App\Http\Controllers\Rida\MagisterController::class, 'add'])->name('add');
            Route::post('/create', [App\Http\Controllers\Rida\MagisterController::class, 'create'])->name('create');
            Route::get('/edit/{id}', [App\Http\Controllers\Rida\MagisterController::class, 'edit'])->name('edit');
            Route::post('/edit/{nama_fakultas}/{periode}/{tahun_input}/{sumber_data}', [App\Http\Controllers\Rida\MagisterController::class, 'update'])->name('update');
            Route::get('/delete/{nama_fakultas}/{periode}/{tahun_input}', [App\Http\Controllers\Rida\MagisterController::class, 'delete'])->name('delete');
            Route::get('/export', [App\Http\Controllers\Rida\MagisterController::class, 'export'])->name('export');
            Route::post('/import', [App\Http\Controllers\Rida\MagisterController::class, 'import'])->name('import');
            Route::post('/updaterow/{id}', [App\Http\Controllers\Rida\MagisterController::class, 'updateRow'])->name('updaterow');

        });

        Route::group(['as' => 'penelitipengabdispesialis.', 'prefix' => '/penelitipengabdispesialis'], function () {
            Route::get('/', [App\Http\Controllers\Rida\SpesialisController::class, 'index'])->name('index');
            Route::get('/pilihperiode/{fakultas}', [App\Http\Controllers\Rida\SpesialisController::class, 'pilihperiode'])->name('pilihperiode');
            Route::get('/details/{nama_fakultas}/{periode}/{tahun_input}', [App\Http\Controllers\Rida\SpesialisController::class, 'details'])->name('details');
            Route::get('/create', [App\Http\Controllers\Rida\SpesialisController::class, 'add'])->name('add');
            Route::post('/create', [App\Http\Controllers\Rida\SpesialisController::class, 'create'])->name('create');
            Route::get('/edit/{id}', [App\Http\Controllers\Rida\SpesialisController::class, 'edit'])->name('edit');
            Route::post('/edit/{nama_fakultas}/{periode}/{tahun_input}/{sumber_data}', [App\Http\Controllers\Rida\SpesialisController::class, 'update'])->name('update');
            Route::get('/delete/{nama_fakultas}/{periode}/{tahun_input}', [App\Http\Controllers\Rida\SpesialisController::class, 'delete'])->name('delete');
            Route::get('/export', [App\Http\Controllers\Rida\SpesialisController::class, 'export'])->name('export');
            Route::post('/import', [App\Http\Controllers\Rida\SpesialisController::class, 'import'])->name('import');
            Route::post('/updaterow/{id}', [App\Http\Controllers\Rida\SpesialisController::class, 'updateRow'])->name('updaterow');

        });

        Route::group(['as' => 'penelitipengabdispesialiskonsultan.', 'prefix' => '/penelitipengabdispesialiskonsultan'], function () {
            Route::get('/', [App\Http\Controllers\Rida\SpesialisKonsultanController::class, 'index'])->name('index');
            Route::get('/pilihperiode/{fakultas}', [App\Http\Controllers\Rida\SpesialisKonsultanController::class, 'pilihperiode'])->name('pilihperiode');
            Route::get('/details/{nama_fakultas}/{periode}/{tahun_input}', [App\Http\Controllers\Rida\SpesialisKonsultanController::class, 'details'])->name('details');
            Route::get('/create', [App\Http\Controllers\Rida\SpesialisKonsultanController::class, 'add'])->name('add');
            Route::post('/create', [App\Http\Controllers\Rida\SpesialisKonsultanController::class, 'create'])->name('create');
            Route::get('/edit/{id}', [App\Http\Controllers\Rida\SpesialisKonsultanController::class, 'edit'])->name('edit');
            Route::post('/edit/{nama_fakultas}/{periode}/{tahun_input}/{sumber_data}', [App\Http\Controllers\Rida\SpesialisKonsultanController::class, 'update'])->name('update');
            Route::get('/delete/{nama_fakultas}/{periode}/{tahun_input}', [App\Http\Controllers\Rida\SpesialisKonsultanController::class, 'delete'])->name('delete');
            Route::get('/export', [App\Http\Controllers\Rida\SpesialisKonsultanController::class, 'export'])->name('export');
            Route::post('/import', [App\Http\Controllers\Rida\SpesialisKonsultanController::class, 'import'])->name('import');
            Route::post('/updaterow/{id}', [App\Http\Controllers\Rida\SpesialisKonsultanController::class, 'updateRow'])->name('updaterow');

        });

        Route::group(['as' => 'penelitipengabdispesialis1.', 'prefix' => '/penelitipengabdispesialis1'], function () {
            Route::get('/', [App\Http\Controllers\Rida\Spesialis1Controller::class, 'index'])->name('index');
            Route::get('/pilihperiode/{fakultas}', [App\Http\Controllers\Rida\Spesialis1Controller::class, 'pilihperiode'])->name('pilihperiode');
            Route::get('/details/{nama_fakultas}/{periode}/{tahun_input}', [App\Http\Controllers\Rida\Spesialis1Controller::class, 'details'])->name('details');
            Route::get('/create', [App\Http\Controllers\Rida\Spesialis1Controller::class, 'add'])->name('add');
            Route::post('/create', [App\Http\Controllers\Rida\Spesialis1Controller::class, 'create'])->name('create');
            Route::get('/edit/{id}', [App\Http\Controllers\Rida\Spesialis1Controller::class, 'edit'])->name('edit');
            Route::post('/edit/{nama_fakultas}/{periode}/{tahun_input}/{sumber_data}', [App\Http\Controllers\Rida\Spesialis1Controller::class, 'update'])->name('update');
            Route::get('/delete/{nama_fakultas}/{periode}/{tahun_input}', [App\Http\Controllers\Rida\Spesialis1Controller::class, 'delete'])->name('delete');
            Route::get('/export', [App\Http\Controllers\Rida\Spesialis1Controller::class, 'export'])->name('export');
            Route::post('/import', [App\Http\Controllers\Rida\Spesialis1Controller::class, 'import'])->name('import');
            Route::post('/updaterow/{id}', [App\Http\Controllers\Rida\Spesialis1Controller::class, 'updateRow'])->name('updaterow');

        });

        Route::group(['as' => 'penelitipengabdiprofesi.', 'prefix' => '/penelitipengabdiprofesi'], function () {
            Route::get('/', [App\Http\Controllers\Rida\ProfesiController::class, 'index'])->name('index');
            Route::get('/pilihperiode/{fakultas}', [App\Http\Controllers\Rida\ProfesiController::class, 'pilihperiode'])->name('pilihperiode');
            Route::get('/details/{nama_fakultas}/{periode}/{tahun_input}', [App\Http\Controllers\Rida\ProfesiController::class, 'details'])->name('details');
            Route::get('/create', [App\Http\Controllers\Rida\ProfesiController::class, 'add'])->name('add');
            Route::post('/create', [App\Http\Controllers\Rida\ProfesiController::class, 'create'])->name('create');
            Route::get('/edit/{id}', [App\Http\Controllers\Rida\ProfesiController::class, 'edit'])->name('edit');
            Route::post('/edit/{nama_fakultas}/{periode}/{tahun_input}/{sumber_data}', [App\Http\Controllers\Rida\ProfesiController::class, 'update'])->name('update');
            Route::get('/delete/{nama_fakultas}/{periode}/{tahun_input}', [App\Http\Controllers\Rida\ProfesiController::class, 'delete'])->name('delete');
            Route::get('/export', [App\Http\Controllers\Rida\ProfesiController::class, 'export'])->name('export');
            Route::post('/import', [App\Http\Controllers\Rida\ProfesiController::class, 'import'])->name('import');
            Route::post('/updaterow/{id}', [App\Http\Controllers\Rida\ProfesiController::class, 'updateRow'])->name('updaterow');
            
        });
        
        Route::group(['as' => 'indekspenelitipkm.', 'prefix' => '/indekspenelitipkm'], function () {
            Route::get('/', [App\Http\Controllers\Rida\IndeksPenelitiPKMController::class, 'index'])->name('index');
            Route::get('/details/{periode}/{tahun_input}', [App\Http\Controllers\Rida\IndeksPenelitiPKMController::class, 'details'])->name('details');
            Route::get('/create', [App\Http\Controllers\Rida\IndeksPenelitiPKMController::class, 'add'])->name('add');
            Route::post('/create', [App\Http\Controllers\Rida\IndeksPenelitiPKMController::class, 'create'])->name('create');
            Route::get('/edit/{id}', [App\Http\Controllers\Rida\IndeksPenelitiPKMController::class, 'edit'])->name('edit');
            Route::post('/edit/{periode}/{tahun_input}/{sumber_data}', [App\Http\Controllers\Rida\IndeksPenelitiPKMController::class, 'update'])->name('update');
            Route::get('/delete/{periode}/{tahun_input}', [App\Http\Controllers\Rida\IndeksPenelitiPKMController::class, 'delete'])->name('delete');
            Route::get('/export', [App\Http\Controllers\Rida\IndeksPenelitiPKMController::class, 'export'])->name('export');
            Route::post('/import', [App\Http\Controllers\Rida\IndeksPenelitiPKMController::class, 'import'])->name('import');
            Route::post('/updaterow/{id}', [App\Http\Controllers\Rida\IndeksPenelitiPKMController::class, 'updateRow'])->name('updaterow');
        });

        Route::group(['as' => 'penelitipengabdikependidikanmagister.', 'prefix' => '/penelitipengabdikependidikanmagister'], function () {
            Route::get('/', [App\Http\Controllers\Rida\Kependidikan\MagisterController::class, 'index'])->name('index');
            Route::get('/pilihperiode/{fakultas}', [App\Http\Controllers\Rida\Kependidikan\MagisterController::class, 'pilihperiode'])->name('pilihperiode');
            Route::get('/details/{nama_fakultas}/{periode}/{tahun_input}', [App\Http\Controllers\Rida\Kependidikan\MagisterController::class, 'details'])->name('details');
            Route::get('/create', [App\Http\Controllers\Rida\Kependidikan\MagisterController::class, 'add'])->name('add');
            Route::post('/create', [App\Http\Controllers\Rida\Kependidikan\MagisterController::class, 'create'])->name('create');
            Route::get('/edit/{id}', [App\Http\Controllers\Rida\Kependidikan\MagisterController::class, 'edit'])->name('edit');
            Route::post('/edit/{nama_fakultas}/{periode}/{tahun_input}/{sumber_data}', [App\Http\Controllers\Rida\Kependidikan\MagisterController::class, 'update'])->name('update');
            Route::get('/delete/{nama_fakultas}/{periode}/{tahun_input}', [App\Http\Controllers\Rida\Kependidikan\MagisterController::class, 'delete'])->name('delete');
            Route::get('/export', [App\Http\Controllers\Rida\Kependidikan\MagisterController::class, 'export'])->name('export');
            Route::post('/import', [App\Http\Controllers\Rida\Kependidikan\MagisterController::class, 'import'])->name('import');
            Route::post('/updaterow/{id}', [App\Http\Controllers\Rida\Kependidikan\MagisterController::class, 'updateRow'])->name('updaterow');
        });

        Route::group(['as' => 'penelitipengabdikependidikanprofesi.', 'prefix' => '/penelitipengabdikependidikanprofesi'], function () {
            Route::get('/', [App\Http\Controllers\Rida\Kependidikan\ProfesiController::class, 'index'])->name('index');
            Route::get('/pilihperiode/{fakultas}', [App\Http\Controllers\Rida\Kependidikan\ProfesiController::class, 'pilihperiode'])->name('pilihperiode');
            Route::get('/details/{nama_fakultas}/{periode}/{tahun_input}', [App\Http\Controllers\Rida\Kependidikan\ProfesiController::class, 'details'])->name('details');
            Route::get('/create', [App\Http\Controllers\Rida\Kependidikan\ProfesiController::class, 'add'])->name('add');
            Route::post('/create', [App\Http\Controllers\Rida\Kependidikan\ProfesiController::class, 'create'])->name('create');
            Route::get('/edit/{id}', [App\Http\Controllers\Rida\Kependidikan\ProfesiController::class, 'edit'])->name('edit');
            Route::post('/edit/{nama_fakultas}/{periode}/{tahun_input}/{sumber_data}', [App\Http\Controllers\Rida\Kependidikan\ProfesiController::class, 'update'])->name('update');
            Route::get('/delete/{nama_fakultas}/{periode}/{tahun_input}', [App\Http\Controllers\Rida\Kependidikan\ProfesiController::class, 'delete'])->name('delete');
            Route::get('/export', [App\Http\Controllers\Rida\Kependidikan\ProfesiController::class, 'export'])->name('export');
            Route::post('/import', [App\Http\Controllers\Rida\Kependidikan\ProfesiController::class, 'import'])->name('import');
            Route::post('/updaterow/{id}', [App\Http\Controllers\Rida\Kependidikan\ProfesiController::class, 'updateRow'])->name('updaterow');
        });

        Route::group(['as' => 'penelitipengabdikependidikansarjana.', 'prefix' => '/penelitipengabdikependidikansarjana'], function () {
            Route::get('/', [App\Http\Controllers\Rida\Kependidikan\SarjanaController::class, 'index'])->name('index');
            Route::get('/pilihperiode/{fakultas}', [App\Http\Controllers\Rida\Kependidikan\SarjanaController::class, 'pilihperiode'])->name('pilihperiode');
            Route::get('/details/{nama_fakultas}/{periode}/{tahun_input}', [App\Http\Controllers\Rida\Kependidikan\SarjanaController::class, 'details'])->name('details');
            Route::get('/create', [App\Http\Controllers\Rida\Kependidikan\SarjanaController::class, 'add'])->name('add');
            Route::post('/create', [App\Http\Controllers\Rida\Kependidikan\SarjanaController::class, 'create'])->name('create');
            Route::get('/edit/{id}', [App\Http\Controllers\Rida\Kependidikan\SarjanaController::class, 'edit'])->name('edit');
            Route::post('/edit/{nama_fakultas}/{periode}/{tahun_input}/{sumber_data}', [App\Http\Controllers\Rida\Kependidikan\SarjanaController::class, 'update'])->name('update');
            Route::get('/delete/{nama_fakultas}/{periode}/{tahun_input}', [App\Http\Controllers\Rida\Kependidikan\SarjanaController::class, 'delete'])->name('delete');
            Route::get('/export', [App\Http\Controllers\Rida\Kependidikan\SarjanaController::class, 'export'])->name('export');
            Route::post('/import', [App\Http\Controllers\Rida\Kependidikan\SarjanaController::class, 'import'])->name('import');
            Route::post('/updaterow/{id}', [App\Http\Controllers\Rida\Kependidikan\SarjanaController::class, 'updateRow'])->name('updaterow');
        });

        Route::group(['as' => 'penelitipengabdikependidikandiploma4.', 'prefix' => '/penelitipengabdikependidikandiploma4'], function () {
            Route::get('/', [App\Http\Controllers\Rida\Kependidikan\Diploma4Controller::class, 'index'])->name('index');
            Route::get('/pilihperiode/{fakultas}', [App\Http\Controllers\Rida\Kependidikan\Diploma4Controller::class, 'pilihperiode'])->name('pilihperiode');
            Route::get('/details/{nama_fakultas}/{periode}/{tahun_input}', [App\Http\Controllers\Rida\Kependidikan\Diploma4Controller::class, 'details'])->name('details');
            Route::get('/create', [App\Http\Controllers\Rida\Kependidikan\Diploma4Controller::class, 'add'])->name('add');
            Route::post('/create', [App\Http\Controllers\Rida\Kependidikan\Diploma4Controller::class, 'create'])->name('create');
            Route::get('/edit/{id}', [App\Http\Controllers\Rida\Kependidikan\Diploma4Controller::class, 'edit'])->name('edit');
            Route::post('/edit/{nama_fakultas}/{periode}/{tahun_input}/{sumber_data}', [App\Http\Controllers\Rida\Kependidikan\Diploma4Controller::class, 'update'])->name('update');
            Route::get('/delete/{nama_fakultas}/{periode}/{tahun_input}', [App\Http\Controllers\Rida\Kependidikan\Diploma4Controller::class, 'delete'])->name('delete');
            Route::get('/export', [App\Http\Controllers\Rida\Kependidikan\Diploma4Controller::class, 'export'])->name('export');
            Route::post('/import', [App\Http\Controllers\Rida\Kependidikan\Diploma4Controller::class, 'import'])->name('import');
            Route::post('/updaterow/{id}', [App\Http\Controllers\Rida\Kependidikan\Diploma4Controller::class, 'updateRow'])->name('updaterow');
        });

        Route::group(['as' => 'penelitipengabdikependidikandiploma3.', 'prefix' => '/penelitipengabdikependidikandiploma3'], function () {
            Route::get('/', [App\Http\Controllers\Rida\Kependidikan\Diploma3Controller::class, 'index'])->name('index');
            Route::get('/pilihperiode/{fakultas}', [App\Http\Controllers\Rida\Kependidikan\Diploma3Controller::class, 'pilihperiode'])->name('pilihperiode');
            Route::get('/details/{nama_fakultas}/{periode}/{tahun_input}', [App\Http\Controllers\Rida\Kependidikan\Diploma3Controller::class, 'details'])->name('details');
            Route::get('/create', [App\Http\Controllers\Rida\Kependidikan\Diploma3Controller::class, 'add'])->name('add');
            Route::post('/create', [App\Http\Controllers\Rida\Kependidikan\Diploma3Controller::class, 'create'])->name('create');
            Route::get('/edit/{id}', [App\Http\Controllers\Rida\Kependidikan\Diploma3Controller::class, 'edit'])->name('edit');
            Route::post('/edit/{nama_fakultas}/{periode}/{tahun_input}/{sumber_data}', [App\Http\Controllers\Rida\Kependidikan\Diploma3Controller::class, 'update'])->name('update');
            Route::get('/delete/{nama_fakultas}/{periode}/{tahun_input}', [App\Http\Controllers\Rida\Kependidikan\Diploma3Controller::class, 'delete'])->name('delete');
            Route::get('/export', [App\Http\Controllers\Rida\Kependidikan\Diploma3Controller::class, 'export'])->name('export');
            Route::post('/import', [App\Http\Controllers\Rida\Kependidikan\Diploma3Controller::class, 'import'])->name('import');
            Route::post('/updaterow/{id}', [App\Http\Controllers\Rida\Kependidikan\Diploma3Controller::class, 'updateRow'])->name('updaterow');
        });

        Route::group(['as' => 'penelitipengabdikependidikandiploma2.', 'prefix' => '/penelitipengabdikependidikandiploma2'], function () {
            Route::get('/', [App\Http\Controllers\Rida\Kependidikan\Diploma2Controller::class, 'index'])->name('index');
            Route::get('/pilihperiode/{fakultas}', [App\Http\Controllers\Rida\Kependidikan\Diploma2Controller::class, 'pilihperiode'])->name('pilihperiode');
            Route::get('/details/{nama_fakultas}/{periode}/{tahun_input}', [App\Http\Controllers\Rida\Kependidikan\Diploma2Controller::class, 'details'])->name('details');
            Route::get('/create', [App\Http\Controllers\Rida\Kependidikan\Diploma2Controller::class, 'add'])->name('add');
            Route::post('/create', [App\Http\Controllers\Rida\Kependidikan\Diploma2Controller::class, 'create'])->name('create');
            Route::get('/edit/{id}', [App\Http\Controllers\Rida\Kependidikan\Diploma2Controller::class, 'edit'])->name('edit');
            Route::post('/edit/{nama_fakultas}/{periode}/{tahun_input}/{sumber_data}', [App\Http\Controllers\Rida\Kependidikan\Diploma2Controller::class, 'update'])->name('update');
            Route::get('/delete/{nama_fakultas}/{periode}/{tahun_input}', [App\Http\Controllers\Rida\Kependidikan\Diploma2Controller::class, 'delete'])->name('delete');
            Route::get('/export', [App\Http\Controllers\Rida\Kependidikan\Diploma2Controller::class, 'export'])->name('export');
            Route::post('/import', [App\Http\Controllers\Rida\Kependidikan\Diploma2Controller::class, 'import'])->name('import');
            Route::post('/updaterow/{id}', [App\Http\Controllers\Rida\Kependidikan\Diploma2Controller::class, 'updateRow'])->name('updaterow');
        });

        Route::group(['as' => 'penelitipengabdikependidikandiploma1.', 'prefix' => '/penelitipengabdikependidikandiploma1'], function () {
            Route::get('/', [App\Http\Controllers\Rida\Kependidikan\Diploma1Controller::class, 'index'])->name('index');
            Route::get('/pilihperiode/{fakultas}', [App\Http\Controllers\Rida\Kependidikan\Diploma1Controller::class, 'pilihperiode'])->name('pilihperiode');
            Route::get('/details/{nama_fakultas}/{periode}/{tahun_input}', [App\Http\Controllers\Rida\Kependidikan\Diploma1Controller::class, 'details'])->name('details');
            Route::get('/create', [App\Http\Controllers\Rida\Kependidikan\Diploma1Controller::class, 'add'])->name('add');
            Route::post('/create', [App\Http\Controllers\Rida\Kependidikan\Diploma1Controller::class, 'create'])->name('create');
            Route::get('/edit/{id}', [App\Http\Controllers\Rida\Kependidikan\Diploma1Controller::class, 'edit'])->name('edit');
            Route::post('/edit/{nama_fakultas}/{periode}/{tahun_input}/{sumber_data}', [App\Http\Controllers\Rida\Kependidikan\Diploma1Controller::class, 'update'])->name('update');
            Route::get('/delete/{nama_fakultas}/{periode}/{tahun_input}', [App\Http\Controllers\Rida\Kependidikan\Diploma1Controller::class, 'delete'])->name('delete');
            Route::get('/export', [App\Http\Controllers\Rida\Kependidikan\Diploma1Controller::class, 'export'])->name('export');
            Route::post('/import', [App\Http\Controllers\Rida\Kependidikan\Diploma1Controller::class, 'import'])->name('import');
            Route::post('/updaterow/{id}', [App\Http\Controllers\Rida\Kependidikan\Diploma1Controller::class, 'updateRow'])->name('updaterow');
        });

        Route::group(['as' => 'penelitipengabdikependidikanslta.', 'prefix' => '/penelitipengabdikependidikanslta'], function () {
            Route::get('/', [App\Http\Controllers\Rida\Kependidikan\SltaController::class, 'index'])->name('index');
            Route::get('/pilihperiode/{fakultas}', [App\Http\Controllers\Rida\Kependidikan\SltaController::class, 'pilihperiode'])->name('pilihperiode');
            Route::get('/details/{nama_fakultas}/{periode}/{tahun_input}', [App\Http\Controllers\Rida\Kependidikan\SltaController::class, 'details'])->name('details');
            Route::get('/create', [App\Http\Controllers\Rida\Kependidikan\SltaController::class, 'add'])->name('add');
            Route::post('/create', [App\Http\Controllers\Rida\Kependidikan\SltaController::class, 'create'])->name('create');
            Route::get('/edit/{id}', [App\Http\Controllers\Rida\Kependidikan\SltaController::class, 'edit'])->name('edit');
            Route::post('/edit/{nama_fakultas}/{periode}/{tahun_input}/{sumber_data}', [App\Http\Controllers\Rida\Kependidikan\SltaController::class, 'update'])->name('update');
            Route::get('/delete/{nama_fakultas}/{periode}/{tahun_input}', [App\Http\Controllers\Rida\Kependidikan\SltaController::class, 'delete'])->name('delete');
            Route::get('/export', [App\Http\Controllers\Rida\Kependidikan\SltaController::class, 'export'])->name('export');
            Route::post('/import', [App\Http\Controllers\Rida\Kependidikan\SltaController::class, 'import'])->name('import');
            Route::post('/updaterow/{id}', [App\Http\Controllers\Rida\Kependidikan\SltaController::class, 'updateRow'])->name('updaterow');
        });

        Route::group(['as' => 'penelitipengabdikependidikansltp.', 'prefix' => '/penelitipengabdikependidikansltp'], function () {
            Route::get('/', [App\Http\Controllers\Rida\Kependidikan\SltpController::class, 'index'])->name('index');
            Route::get('/pilihperiode/{fakultas}', [App\Http\Controllers\Rida\Kependidikan\SltpController::class, 'pilihperiode'])->name('pilihperiode');
            Route::get('/details/{nama_fakultas}/{periode}/{tahun_input}', [App\Http\Controllers\Rida\Kependidikan\SltpController::class, 'details'])->name('details');
            Route::get('/create', [App\Http\Controllers\Rida\Kependidikan\SltpController::class, 'add'])->name('add');
            Route::post('/create', [App\Http\Controllers\Rida\Kependidikan\SltpController::class, 'create'])->name('create');
            Route::get('/edit/{id}', [App\Http\Controllers\Rida\Kependidikan\SltpController::class, 'edit'])->name('edit');
            Route::post('/edit/{nama_fakultas}/{periode}/{tahun_input}/{sumber_data}', [App\Http\Controllers\Rida\Kependidikan\SltpController::class, 'update'])->name('update');
            Route::get('/delete/{nama_fakultas}/{periode}/{tahun_input}', [App\Http\Controllers\Rida\Kependidikan\SltpController::class, 'delete'])->name('delete');
            Route::get('/export', [App\Http\Controllers\Rida\Kependidikan\SltpController::class, 'export'])->name('export');
            Route::post('/import', [App\Http\Controllers\Rida\Kependidikan\SltpController::class, 'import'])->name('import');
            Route::post('/updaterow/{id}', [App\Http\Controllers\Rida\Kependidikan\SltpController::class, 'updateRow'])->name('updaterow');
        });

        Route::group(['as' => 'penelitipengabdikependidikansd.', 'prefix' => '/penelitipengabdikependidikansd'], function () {
            Route::get('/', [App\Http\Controllers\Rida\Kependidikan\SdController::class, 'index'])->name('index');
            Route::get('/pilihperiode/{fakultas}', [App\Http\Controllers\Rida\Kependidikan\SdController::class, 'pilihperiode'])->name('pilihperiode');
            Route::get('/details/{nama_fakultas}/{periode}/{tahun_input}', [App\Http\Controllers\Rida\Kependidikan\SdController::class, 'details'])->name('details');
            Route::get('/create', [App\Http\Controllers\Rida\Kependidikan\SdController::class, 'add'])->name('add');
            Route::post('/create', [App\Http\Controllers\Rida\Kependidikan\SdController::class, 'create'])->name('create');
            Route::get('/edit/{id}', [App\Http\Controllers\Rida\Kependidikan\SdController::class, 'edit'])->name('edit');
            Route::post('/edit/{nama_fakultas}/{periode}/{tahun_input}/{sumber_data}', [App\Http\Controllers\Rida\Kependidikan\SdController::class, 'update'])->name('update');
            Route::get('/delete/{nama_fakultas}/{periode}/{tahun_input}', [App\Http\Controllers\Rida\Kependidikan\SdController::class, 'delete'])->name('delete');
            Route::get('/export', [App\Http\Controllers\Rida\Kependidikan\SdController::class, 'export'])->name('export');
            Route::post('/import', [App\Http\Controllers\Rida\Kependidikan\SdController::class, 'import'])->name('import');
            Route::post('/updaterow/{id}', [App\Http\Controllers\Rida\Kependidikan\SdController::class, 'updateRow'])->name('updaterow');
        });

        Route::group(['as' => 'usiaproduktifdoktoral.', 'prefix' => '/usiaproduktifdoktoral'], function () {
            Route::get('/', [App\Http\Controllers\Rida\UsiaProduktif\DoktoralController::class, 'index'])->name('index');
            Route::get('/pilihperiode/{fakultas}', [App\Http\Controllers\Rida\UsiaProduktif\DoktoralController::class, 'pilihperiode'])->name('pilihperiode');
            Route::get('/details/{nama_fakultas}/{periode}/{tahun_input}', [App\Http\Controllers\Rida\UsiaProduktif\DoktoralController::class, 'details'])->name('details');
            Route::get('/create', [App\Http\Controllers\Rida\UsiaProduktif\DoktoralController::class, 'add'])->name('add');
            Route::post('/create', [App\Http\Controllers\Rida\UsiaProduktif\DoktoralController::class, 'create'])->name('create');
            Route::get('/edit/{id}', [App\Http\Controllers\Rida\UsiaProduktif\DoktoralController::class, 'edit'])->name('edit');
            Route::post('/edit/{nama_fakultas}/{periode}/{tahun_input}/{sumber_data}', [App\Http\Controllers\Rida\UsiaProduktif\DoktoralController::class, 'update'])->name('update');
            Route::get('/delete/{nama_fakultas}/{periode}/{tahun_input}', [App\Http\Controllers\Rida\UsiaProduktif\DoktoralController::class, 'delete'])->name('delete');
            Route::get('/export', [App\Http\Controllers\Rida\UsiaProduktif\DoktoralController::class, 'export'])->name('export');
            Route::post('/import', [App\Http\Controllers\Rida\UsiaProduktif\DoktoralController::class, 'import'])->name('import');
            Route::post('/updaterow/{id}', [App\Http\Controllers\Rida\UsiaProduktif\DoktoralController::class, 'updateRow'])->name('updaterow');
        });

        Route::group(['as' => 'usiaproduktifmagister.', 'prefix' => '/usiaproduktifmagister'], function () {
            Route::get('/', [App\Http\Controllers\Rida\UsiaProduktif\MagisterController::class, 'index'])->name('index');
            Route::get('/pilihperiode/{fakultas}', [App\Http\Controllers\Rida\UsiaProduktif\MagisterController::class, 'pilihperiode'])->name('pilihperiode');
            Route::get('/details/{nama_fakultas}/{periode}/{tahun_input}', [App\Http\Controllers\Rida\UsiaProduktif\MagisterController::class, 'details'])->name('details');
            Route::get('/create', [App\Http\Controllers\Rida\UsiaProduktif\MagisterController::class, 'add'])->name('add');
            Route::post('/create', [App\Http\Controllers\Rida\UsiaProduktif\MagisterController::class, 'create'])->name('create');
            Route::get('/edit/{id}', [App\Http\Controllers\Rida\UsiaProduktif\MagisterController::class, 'edit'])->name('edit');
            Route::post('/edit/{nama_fakultas}/{periode}/{tahun_input}/{sumber_data}', [App\Http\Controllers\Rida\UsiaProduktif\MagisterController::class, 'update'])->name('update');
            Route::get('/delete/{nama_fakultas}/{periode}/{tahun_input}', [App\Http\Controllers\Rida\UsiaProduktif\MagisterController::class, 'delete'])->name('delete');
            Route::get('/export', [App\Http\Controllers\Rida\UsiaProduktif\MagisterController::class, 'export'])->name('export');
            Route::post('/import', [App\Http\Controllers\Rida\UsiaProduktif\MagisterController::class, 'import'])->name('import');
            Route::post('/updaterow/{id}', [App\Http\Controllers\Rida\UsiaProduktif\MagisterController::class, 'updateRow'])->name('updaterow');
        });

        Route::group(['as' => 'usiaproduktifsp_2.', 'prefix' => '/usiaproduktifsp_2'], function () {
            Route::get('/', [App\Http\Controllers\Rida\UsiaProduktif\SP_2Controller::class, 'index'])->name('index');
            Route::get('/pilihperiode/{fakultas}', [App\Http\Controllers\Rida\UsiaProduktif\SP_2Controller::class, 'pilihperiode'])->name('pilihperiode');
            Route::get('/details/{nama_fakultas}/{periode}/{tahun_input}', [App\Http\Controllers\Rida\UsiaProduktif\SP_2Controller::class, 'details'])->name('details');
            Route::get('/create', [App\Http\Controllers\Rida\UsiaProduktif\SP_2Controller::class, 'add'])->name('add');
            Route::post('/create', [App\Http\Controllers\Rida\UsiaProduktif\SP_2Controller::class, 'create'])->name('create');
            Route::get('/edit/{id}', [App\Http\Controllers\Rida\UsiaProduktif\SP_2Controller::class, 'edit'])->name('edit');
            Route::post('/edit/{nama_fakultas}/{periode}/{tahun_input}/{sumber_data}', [App\Http\Controllers\Rida\UsiaProduktif\SP_2Controller::class, 'update'])->name('update');
            Route::get('/delete/{nama_fakultas}/{periode}/{tahun_input}', [App\Http\Controllers\Rida\UsiaProduktif\SP_2Controller::class, 'delete'])->name('delete');
            Route::get('/export', [App\Http\Controllers\Rida\UsiaProduktif\SP_2Controller::class, 'export'])->name('export');
            Route::post('/import', [App\Http\Controllers\Rida\UsiaProduktif\SP_2Controller::class, 'import'])->name('import');
            Route::post('/updaterow/{id}', [App\Http\Controllers\Rida\UsiaProduktif\SP_2Controller::class, 'updateRow'])->name('updaterow');
        });

        Route::group(['as' => 'usiaproduktifsp_1k.', 'prefix' => '/usiaproduktifsp_1k'], function () {
            Route::get('/', [App\Http\Controllers\Rida\UsiaProduktif\SP_1KController::class, 'index'])->name('index');
            Route::get('/pilihperiode/{fakultas}', [App\Http\Controllers\Rida\UsiaProduktif\SP_1KController::class, 'pilihperiode'])->name('pilihperiode');
            Route::get('/details/{nama_fakultas}/{periode}/{tahun_input}', [App\Http\Controllers\Rida\UsiaProduktif\SP_1KController::class, 'details'])->name('details');
            Route::get('/create', [App\Http\Controllers\Rida\UsiaProduktif\SP_1KController::class, 'add'])->name('add');
            Route::post('/create', [App\Http\Controllers\Rida\UsiaProduktif\SP_1KController::class, 'create'])->name('create');
            Route::get('/edit/{id}', [App\Http\Controllers\Rida\UsiaProduktif\SP_1KController::class, 'edit'])->name('edit');
            Route::post('/edit/{nama_fakultas}/{periode}/{tahun_input}/{sumber_data}', [App\Http\Controllers\Rida\UsiaProduktif\SP_1KController::class, 'update'])->name('update');
            Route::get('/delete/{nama_fakultas}/{periode}/{tahun_input}', [App\Http\Controllers\Rida\UsiaProduktif\SP_1KController::class, 'delete'])->name('delete');
            Route::get('/export', [App\Http\Controllers\Rida\UsiaProduktif\SP_1KController::class, 'export'])->name('export');
            Route::post('/import', [App\Http\Controllers\Rida\UsiaProduktif\SP_1KController::class, 'import'])->name('import');
            Route::post('/updaterow/{id}', [App\Http\Controllers\Rida\UsiaProduktif\SP_1KController::class, 'updateRow'])->name('updaterow');
        });

        Route::group(['as' => 'usiaproduktifsp_1.', 'prefix' => '/usiaproduktifsp_1'], function () {
            Route::get('/', [App\Http\Controllers\Rida\UsiaProduktif\SP_1Controller::class, 'index'])->name('index');
            Route::get('/pilihperiode/{fakultas}', [App\Http\Controllers\Rida\UsiaProduktif\SP_1Controller::class, 'pilihperiode'])->name('pilihperiode');
            Route::get('/details/{nama_fakultas}/{periode}/{tahun_input}', [App\Http\Controllers\Rida\UsiaProduktif\SP_1Controller::class, 'details'])->name('details');
            Route::get('/create', [App\Http\Controllers\Rida\UsiaProduktif\SP_1Controller::class, 'add'])->name('add');
            Route::post('/create', [App\Http\Controllers\Rida\UsiaProduktif\SP_1Controller::class, 'create'])->name('create');
            Route::get('/edit/{id}', [App\Http\Controllers\Rida\UsiaProduktif\SP_1Controller::class, 'edit'])->name('edit');
            Route::post('/edit/{nama_fakultas}/{periode}/{tahun_input}/{sumber_data}', [App\Http\Controllers\Rida\UsiaProduktif\SP_1Controller::class, 'update'])->name('update');
            Route::get('/delete/{nama_fakultas}/{periode}/{tahun_input}', [App\Http\Controllers\Rida\UsiaProduktif\SP_1Controller::class, 'delete'])->name('delete');
            Route::get('/export', [App\Http\Controllers\Rida\UsiaProduktif\SP_1Controller::class, 'export'])->name('export');
            Route::post('/import', [App\Http\Controllers\Rida\UsiaProduktif\SP_1Controller::class, 'import'])->name('import');
            Route::post('/updaterow/{id}', [App\Http\Controllers\Rida\UsiaProduktif\SP_1Controller::class, 'updateRow'])->name('updaterow');
        });

        Route::group(['as' => 'usiaproduktifprofesi.', 'prefix' => '/usiaproduktifprofesi'], function () {
            Route::get('/', [App\Http\Controllers\Rida\UsiaProduktif\ProfesiController::class, 'index'])->name('index');
            Route::get('/pilihperiode/{fakultas}', [App\Http\Controllers\Rida\UsiaProduktif\ProfesiController::class, 'pilihperiode'])->name('pilihperiode');
            Route::get('/details/{nama_fakultas}/{periode}/{tahun_input}', [App\Http\Controllers\Rida\UsiaProduktif\ProfesiController::class, 'details'])->name('details');
            Route::get('/create', [App\Http\Controllers\Rida\UsiaProduktif\ProfesiController::class, 'add'])->name('add');
            Route::post('/create', [App\Http\Controllers\Rida\UsiaProduktif\ProfesiController::class, 'create'])->name('create');
            Route::get('/edit/{id}', [App\Http\Controllers\Rida\UsiaProduktif\ProfesiController::class, 'edit'])->name('edit');
            Route::post('/edit/{nama_fakultas}/{periode}/{tahun_input}/{sumber_data}', [App\Http\Controllers\Rida\UsiaProduktif\ProfesiController::class, 'update'])->name('update');
            Route::get('/delete/{nama_fakultas}/{periode}/{tahun_input}', [App\Http\Controllers\Rida\UsiaProduktif\ProfesiController::class, 'delete'])->name('delete');
            Route::get('/export', [App\Http\Controllers\Rida\UsiaProduktif\ProfesiController::class, 'export'])->name('export');
            Route::post('/import', [App\Http\Controllers\Rida\UsiaProduktif\ProfesiController::class, 'import'])->name('import');
            Route::post('/updaterow/{id}', [App\Http\Controllers\Rida\UsiaProduktif\ProfesiController::class, 'updateRow'])->name('updaterow');
        });


        
        Route::group(['as' => 'researchgroup.', 'prefix' => '/researchgroup'], function () {
            Route::get('/', [App\Http\Controllers\Rida\ResearchController::class, 'index'])->name('index');
            Route::get('/pilihperiode/{fakultas}', [App\Http\Controllers\Rida\ResearchController::class, 'pilihperiode'])->name('pilihperiode');
            Route::get('/details', [App\Http\Controllers\Rida\ResearchController::class, 'details'])->name('details');
            Route::get('/create', [App\Http\Controllers\Rida\ResearchController::class, 'add'])->name('add');
            Route::post('/create', [App\Http\Controllers\Rida\ResearchController::class, 'create'])->name('create');
            Route::get('/edit', [App\Http\Controllers\Rida\ResearchController::class, 'edit'])->name('edit');
            Route::post('/edit/{periode}/{tahun_input}/{sumber_data}', [App\Http\Controllers\Rida\ResearchController::class, 'update'])->name('update');
            Route::get('/delete/{periode}/{tahun_input}', [App\Http\Controllers\Rida\ResearchController::class, 'delete'])->name('delete');
            Route::get('/export', [App\Http\Controllers\Rida\ResearchController::class, 'export'])->name('export');
            Route::post('/import', [App\Http\Controllers\Rida\ResearchController::class, 'import'])->name('import');
            Route::post('/updaterow/{id}', [App\Http\Controllers\Rida\ResearchController::class, 'updateRow'])->name('updaterow');
        });

        Route::group(['as' => 'kerjasamapenelitian.', 'prefix' => '/kerjasamapenelitian'], function () {
            Route::get('/', [App\Http\Controllers\Rida\KerjasamaPenelitianController::class, 'index'])->name('index');
            Route::get('/pilihperiode/{fakultas}', [App\Http\Controllers\Rida\KerjasamaPenelitianController::class, 'pilihperiode'])->name('pilihperiode');
            Route::get('/details', [App\Http\Controllers\Rida\KerjasamaPenelitianController::class, 'details'])->name('details');
            Route::get('/create', [App\Http\Controllers\Rida\KerjasamaPenelitianController::class, 'add'])->name('add');
            Route::post('/create', [App\Http\Controllers\Rida\KerjasamaPenelitianController::class, 'create'])->name('create');
            Route::get('/edit', [App\Http\Controllers\Rida\KerjasamaPenelitianController::class, 'edit'])->name('edit');
            Route::post('/edit/{periode}/{tahun_input}/{sumber_data}', [App\Http\Controllers\Rida\KerjasamaPenelitianController::class, 'update'])->name('update');
            Route::get('/delete/{periode}/{tahun_input}', [App\Http\Controllers\Rida\KerjasamaPenelitianController::class, 'delete'])->name('delete');
            Route::get('/export', [App\Http\Controllers\Rida\KerjasamaPenelitianController::class, 'export'])->name('export');
            Route::post('/import', [App\Http\Controllers\Rida\KerjasamaPenelitianController::class, 'import'])->name('import');
            Route::post('/updaterow/{id}', [App\Http\Controllers\Rida\KerjasamaPenelitianController::class, 'updateRow'])->name('updaterow');
        });

        Route::group(['as' => 'hibahmandiri.', 'prefix' => '/hibahmandiri'], function () {
            Route::get('/', [App\Http\Controllers\Rida\HibahMandiriController::class, 'index'])->name('index');
            Route::get('/pilihperiode/{fakultas}', [App\Http\Controllers\Rida\HibahMandiriController::class, 'pilihperiode'])->name('pilihperiode');
            Route::get('/details', [App\Http\Controllers\Rida\HibahMandiriController::class, 'details'])->name('details');
            Route::get('/create', [App\Http\Controllers\Rida\HibahMandiriController::class, 'add'])->name('add');
            Route::post('/create', [App\Http\Controllers\Rida\HibahMandiriController::class, 'create'])->name('create');
            Route::get('/edit', [App\Http\Controllers\Rida\HibahMandiriController::class, 'edit'])->name('edit');
            Route::post('/edit/{periode}/{tahun_input}/{sumber_data}', [App\Http\Controllers\Rida\HibahMandiriController::class, 'update'])->name('update');
            Route::get('/delete/{periode}/{tahun_input}', [App\Http\Controllers\Rida\HibahMandiriController::class, 'delete'])->name('delete');
            Route::get('/export', [App\Http\Controllers\Rida\HibahMandiriController::class, 'export'])->name('export');
            Route::post('/import', [App\Http\Controllers\Rida\HibahMandiriController::class, 'import'])->name('import');
            Route::post('/updaterow/{id}', [App\Http\Controllers\Rida\HibahMandiriController::class, 'updateRow'])->name('updaterow');
        });

        Route::group(['prefix' => '/category'], function () {
            Route::get('/', [App\Http\Controllers\CategoryController::class, 'index'])->name('category.index');
            Route::get('/create', [App\Http\Controllers\CategoryController::class, 'add'])->name('category.add');
            Route::post('/create', [App\Http\Controllers\CategoryController::class, 'create'])->name('category.create');
            Route::get('/edit/{id}', [App\Http\Controllers\CategoryController::class, 'edit'])->name('category.edit');
            Route::post('/edit/{id}', [App\Http\Controllers\CategoryController::class, 'update'])->name('category.update');
            Route::get('/delete/{id}', [App\Http\Controllers\CategoryController::class, 'delete'])->name('category.delete');
        });

        Route::group(['prefix' => '/post'], function () {
            Route::get('/', [PostController::class, 'index'])->name('post.index');
            Route::get('/category/{id}', [PostController::class, 'category'])->name('post.category');
            Route::get('/create', [PostController::class, 'create'])->name('post.create');
            Route::post('/store', [PostController::class, 'store'])->name('post.store');
            Route::get('/{id}/edit', [PostController::class, 'edit'])->name('post.edit');
            Route::put('/{id}', [PostController::class, 'update'])->name('post.update');
            Route::delete('/{id}', [PostController::class, 'delete'])->name('post.delete');
        });

        Route::group(['prefix' => '/koran'], function () {
            Route::get('/', [KoranController::class, 'index'])->name('koran.index');
            Route::get('/category/{id}', [KoranController::class, 'category'])->name('koran.category');
            Route::get('/create', [KoranController::class, 'create'])->name('koran.create');
            Route::post('/store', [KoranController::class, 'store'])->name('koran.store');
            Route::get('/{id}/edit', [KoranController::class, 'edit'])->name('koran.edit');
            Route::put('/{id}', [KoranController::class, 'update'])->name('koran.update');
            Route::delete('/{id}', [KoranController::class, 'delete'])->name('koran.delete');
        });


        Route::group(['prefix' => '/banner'], function () {
            Route::get('/', [App\Http\Controllers\BannerController::class, 'index'])->name('banner.index');
            Route::get('/create', [App\Http\Controllers\BannerController::class, 'create'])->name('banner.create');
            Route::post('/store', [App\Http\Controllers\BannerController::class, 'store'])->name('banner.store');
            Route::get('/{id}/edit', [App\Http\Controllers\BannerController::class, 'edit'])->name('banner.edit');
            Route::put('/{id}', [App\Http\Controllers\BannerController::class, 'update'])->name('banner.update');
            Route::put('/{id}/status', [App\Http\Controllers\BannerController::class, 'updateStatus'])->name('banner.updatestatus');
            Route::delete('/{id}', [App\Http\Controllers\BannerController::class, 'delete'])->name('banner.delete');
        });

        Route::group(['prefix' => '/page'], function () {
            Route::get('/', [App\Http\Controllers\PageController::class, 'index'])->name('page.index');
            Route::get('/create', [App\Http\Controllers\PageController::class, 'create'])->name('page.create');
            Route::post('/store', [App\Http\Controllers\PageController::class, 'store'])->name('page.store');
            Route::get('/edit/{id}', [App\Http\Controllers\PageController::class, 'edit'])->name('page.edit');
            Route::put('/update/{id}', [App\Http\Controllers\PageController::class, 'update'])->name('page.update');
            Route::delete('/delete/{id}', [App\Http\Controllers\PageController::class, 'delete'])->name('page.delete');
        });

        Route::group(['prefix' => '/user'], function () {
            Route::get('/', [App\Http\Controllers\UserController::class, 'index'])->name('user.index');
            Route::get('/create', [App\Http\Controllers\UserController::class, 'create'])->name('user.create');
            Route::post('/store', [App\Http\Controllers\UserController::class, 'store'])->name('user.store');
            Route::get('/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
            Route::put('/update/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');
            Route::delete('/delete/{id}', [App\Http\Controllers\UserController::class, 'delete'])->name('user.delete');
        });

        Route::group(['prefix' => '/permission'], function () {
            Route::get('/', [App\Http\Controllers\PermissionController::class, 'index'])->name('permission.index');
            Route::get('/create', [App\Http\Controllers\PermissionController::class, 'create'])->name('permission.create');
            Route::post('/store', [App\Http\Controllers\PermissionController::class, 'store'])->name('permission.store');
            Route::get('/edit/{id}', [App\Http\Controllers\PermissionController::class, 'edit'])->name('permission.edit');
            Route::put('/update/{id}', [App\Http\Controllers\PermissionController::class, 'update'])->name('permission.update');
            Route::get('/delete/{id}', [App\Http\Controllers\PermissionController::class, 'delete'])->name('permission.delete');
        });

        Route::group(['prefix' => '/agenda'], function () {
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


// Route::get('/dokumentasi-rida', [App\Http\Controllers\User\RidaController::class, 'index'])->name('dokumentasi-rida');

Route::get('/dokumentasi-rida/doktor', [App\Http\Controllers\User\RidaController::class, 'doktoral'])->name('rida-Usia Produktif Doktor');
Route::get('/dokumentasi-rida/magister', [App\Http\Controllers\User\RidaController::class, 'magister'])->name('rida-Usia Produktif Magister');
Route::get('/dokumentasi-rida/spesialis-2', [App\Http\Controllers\User\RidaController::class, 'spesialis2'])->name('rida-Usia Produktif SP2');
Route::get('/dokumentasi-rida/profesi', [App\Http\Controllers\User\RidaController::class, 'profesi'])->name('rida-Usia Produktif Profesi');
Route::get('/dokumentasi-rida/spesialis-1', [App\Http\Controllers\User\RidaController::class, 'spesialis1'])->name('rida-Usia Produktif SP1');
Route::get('/dokumentasi-rida/spesialis-konsultan', [App\Http\Controllers\User\RidaController::class, 'spesialisKonsultan'])->name('rida-Usia Produktif SP-1(K)');

Route::get('/dokumentasi-rida/tenaga-kependidik/magister', [App\Http\Controllers\User\TenagaKependidikanController::class, 'magister'])->name('rida-Tenaga Kependidikan Magister');
Route::get('/dokumentasi-rida/tenaga-kependidik/profesi', [App\Http\Controllers\User\TenagaKependidikanController::class, 'profesi'])->name('rida-Tenaga Kependidikan Profesi');
Route::get('/dokumentasi-rida/tenaga-kependidik/sarjana', [App\Http\Controllers\User\TenagaKependidikanController::class, 'sarjana'])->name('rida-Tenaga Kependidikan Sarjana');
Route::get('/dokumentasi-rida/tenaga-kependidik/D4', [App\Http\Controllers\User\TenagaKependidikanController::class, 'diploma4'])->name('rida-Tenaga Kependidikan D4');
Route::get('/dokumentasi-rida/tenaga-kependidik/D3', [App\Http\Controllers\User\TenagaKependidikanController::class, 'diploma3'])->name('rida-Tenaga Kependidikan D3');
Route::get('/dokumentasi-rida/tenaga-kependidik/D2', [App\Http\Controllers\User\TenagaKependidikanController::class, 'diploma2'])->name('rida-Tenaga Kependidikan D2');
Route::get('/dokumentasi-rida/tenaga-kependidik/D1', [App\Http\Controllers\User\TenagaKependidikanController::class, 'diploma1'])->name('rida-Tenaga Kependidikan D1');
Route::get('/dokumentasi-rida/tenaga-kependidik/slta', [App\Http\Controllers\User\TenagaKependidikanController::class, 'slta'])->name('rida-Tenaga Kependidikan SLTA');
Route::get('/dokumentasi-rida/tenaga-kependidik/sltp', [App\Http\Controllers\User\TenagaKependidikanController::class, 'sltp'])->name('rida-Tenaga Kependidikan SLTP');
Route::get('/dokumentasi-rida/tenaga-kependidik/SD', [App\Http\Controllers\User\TenagaKependidikanController::class, 'sd'])->name('rida-Tenaga Kependidikan SD');

Route::get('/dokumentasi-rida/tenaga-pendidik/doktor', [App\Http\Controllers\User\TenagaPendidikController::class, 'doktor'])->name('rida-Tenaga Pendidik Doktor');
Route::get('/dokumentasi-rida/tenaga-pendidik/magister', [App\Http\Controllers\User\TenagaPendidikController::class, 'magister'])->name('rida-Tenaga Pendidik Magister');
Route::get('/dokumentasi-rida/tenaga-pendidik/spesialis-2', [App\Http\Controllers\User\TenagaPendidikController::class, 'spesialis2'])->name('rida-Tenaga Pendidik Spesialis-2');
Route::get('/dokumentasi-rida/tenaga-pendidik/spesialis-konsultan', [App\Http\Controllers\User\TenagaPendidikController::class, 'spesialisKonsultan'])->name('rida-Tenaga Pendidik Spesialis-1(K)');
Route::get('/dokumentasi-rida/tenaga-pendidik/spesialis-1', [App\Http\Controllers\User\TenagaPendidikController::class, 'spesialis1'])->name('rida-Tenaga Pendidik Spesialis-1');
Route::get('/dokumentasi-rida/tenaga-pendidik/profesi', [App\Http\Controllers\User\TenagaPendidikController::class, 'profesi'])->name('rida-Tenaga Pendidik Profesi');

Route::get('/dokumentasi-rida/hibah-pnbp', [App\Http\Controllers\User\HibahPNBPController::class, 'index'])->name('rida-hibah-pnbp');
Route::get('/dokumentasi-rida/skema-pnbp', [App\Http\Controllers\User\SkemaPNBPController::class, 'index'])->name('rida-skema-pnbp');

/*detail grafik 1-6*/
Route::get('/dokumentasi-rida/pilih_periode/tenaga-pendidik/doktor/{fakultas}/{tahun}', [App\Http\Controllers\User\TenagaPendidikController::class, 'pilih_periode_doktor'])->name('rida-periode-Tenaga Pendidik Doktor');
Route::get('/dokumentasi-rida/detail/tenaga-pendidik/doktor/{fakultas}/{tahun}/{periode}', [App\Http\Controllers\User\TenagaPendidikController::class, 'detail_doktor'])->name('rida-detail-Tenaga Pendidik Doktor');
Route::get('/dokumentasi-rida/export/tenaga-pendidik/doktor/{fakultas}/{tahun}', [App\Http\Controllers\User\TenagaPendidikController::class, 'export_doktor'])->name('rida-export-Tenaga Pendidik Doktor');

Route::get('/dokumentasi-rida/pilih_periode/tenaga-pendidik/magister/{fakultas}/{tahun}', [App\Http\Controllers\User\TenagaPendidikController::class, 'pilih_periode_magister'])->name('rida-periode-Tenaga Pendidik Magister');
Route::get('/dokumentasi-rida/detail/tenaga-pendidik/magister/{fakultas}/{tahun}/{periode}', [App\Http\Controllers\User\TenagaPendidikController::class, 'detail_magister'])->name('rida-detail-Tenaga Pendidik Magister');
Route::get('/dokumentasi-rida/export/tenaga-pendidik/magister/{fakultas}/{tahun}', [App\Http\Controllers\User\TenagaPendidikController::class, 'export_magister'])->name('rida-export-Tenaga Pendidik Magister');

Route::get('/dokumentasi-rida/pilih_periode/tenaga-pendidik/spesialis-2/{fakultas}/{tahun}', [App\Http\Controllers\User\TenagaPendidikController::class, 'pilih_periode_sp_2'])->name('rida-periode-Tenaga Pendidik Spesialis-2');
Route::get('/dokumentasi-rida/detail/tenaga-pendidik/spesialis-2/{fakultas}/{tahun}/{periode}', [App\Http\Controllers\User\TenagaPendidikController::class, 'detail_sp_2'])->name('rida-detail-Tenaga Pendidik Spesialis-2');
Route::get('/dokumentasi-rida/export/tenaga-pendidik/spesialis-2/{fakultas}/{tahun}', [App\Http\Controllers\User\TenagaPendidikController::class, 'export_sp2'])->name('rida-export-Tenaga Pendidik Spesialis-2');

Route::get('/dokumentasi-rida/pilih_periode/tenaga-pendidik/spesialis-konsultan/{fakultas}/{tahun}', [App\Http\Controllers\User\TenagaPendidikController::class, 'pilih_periode_konsultan'])->name('rida-periode-Tenaga Pendidik Spesialis-1(K)');
Route::get('/dokumentasi-rida/detail/tenaga-pendidik/spesialis-konsultan/{fakultas}/{tahun}/{periode}', [App\Http\Controllers\User\TenagaPendidikController::class, 'detail_konsultan'])->name('rida-detail-Tenaga Pendidik Spesialis-1(K)');
Route::get('/dokumentasi-rida/export/tenaga-pendidik/spesialis-konsultan/{fakultas}/{tahun}', [App\Http\Controllers\User\TenagaPendidikController::class, 'export_sp1k'])->name('rida-export-Tenaga Pendidik Spesialis-1(K)');

Route::get('/dokumentasi-rida/pilih_periode/tenaga-pendidik/spesialis-1/{fakultas}/{tahun}', [App\Http\Controllers\User\TenagaPendidikController::class, 'pilih_periode_sp_1'])->name('rida-periode-Tenaga Pendidik Spesialis-1');
Route::get('/dokumentasi-rida/detail/tenaga-pendidik/spesialis-1/{fakultas}/{tahun}/{periode}', [App\Http\Controllers\User\TenagaPendidikController::class, 'detail_sp_1'])->name('rida-detail-Tenaga Pendidik Spesialis-1');
Route::get('/dokumentasi-rida/export/tenaga-pendidik/spesialis-1/{fakultas}/{tahun}', [App\Http\Controllers\User\TenagaPendidikController::class, 'export_sp1'])->name('rida-export-Tenaga Pendidik Spesialis-1');

Route::get('/dokumentasi-rida/pilih_periode/tenaga-pendidik/profesi/{fakultas}/{tahun}', [App\Http\Controllers\User\TenagaPendidikController::class, 'pilih_periode_profesi'])->name('rida-periode-Tenaga Pendidik Profesi');
Route::get('/dokumentasi-rida/detail/tenaga-pendidik/profesi/{fakultas}/{tahun}/{periode}', [App\Http\Controllers\User\TenagaPendidikController::class, 'detail_profesi'])->name('rida-detail-Tenaga Pendidik Profesi');
Route::get('/dokumentasi-rida/export/tenaga-pendidik/profesi/{fakultas}/{tahun}', [App\Http\Controllers\User\TenagaPendidikController::class, 'export_profesi'])->name('rida-export-Tenaga Pendidik Profesi');


/*detail grafik 7-16*/ 
Route::get('/dokumentasi-rida/pilih_periode/tenaga-kependidikan/magister/{fakultas}/{tahun}', [App\Http\Controllers\User\TenagaKependidikanController::class, 'pilih_periode_magister'])->name('rida-periode-Tenaga Kependidikan Magister');
Route::get('/dokumentasi-rida/detail/tenaga-kependidikan/magister/{fakultas}/{tahun}/{periode}', [App\Http\Controllers\User\TenagaKependidikanController::class, 'detail_magister'])->name('rida-detail-Tenaga Kependidikan Magister');
Route::get('/dokumentasi-rida/export/tenaga-kependidikan/magister/{fakultas}/{tahun}', [App\Http\Controllers\User\TenagaKependidikanController::class, 'export_magister'])->name('rida-export-Tenaga Kependidikan Magister');

Route::get('/dokumentasi-rida/pilih_periode/tenaga-kependidikan/profesi/{fakultas}/{tahun}', [App\Http\Controllers\User\TenagaKependidikanController::class, 'pilih_periode_profesi'])->name('rida-periode-Tenaga Kependidikan Profesi');
Route::get('/dokumentasi-rida/detail/tenaga-kependidikan/profesi/{fakultas}/{tahun}/{periode}', [App\Http\Controllers\User\TenagaKependidikanController::class, 'detail_profesi'])->name('rida-detail-Tenaga Kependidikan Profesi');
Route::get('/dokumentasi-rida/export/tenaga-kependidikan/profesi/{fakultas}/{tahun}', [App\Http\Controllers\User\TenagaKependidikanController::class, 'export_profesi'])->name('rida-export-Tenaga Kependidikan Profesi');

Route::get('/dokumentasi-rida/pilih_periode/tenaga-kependidikan/sarjana/{fakultas}/{tahun}', [App\Http\Controllers\User\TenagaKependidikanController::class, 'pilih_periode_sarjana'])->name('rida-periode-Tenaga Kependidikan Sarjana');
Route::get('/dokumentasi-rida/detail/tenaga-kependidikan/sarjana/{fakultas}/{tahun}/{periode}', [App\Http\Controllers\User\TenagaKependidikanController::class, 'detail_sarjana'])->name('rida-detail-Tenaga Kependidikan Sarjana');
Route::get('/dokumentasi-rida/export/tenaga-kependidikan/sarjana/{fakultas}/{tahun}', [App\Http\Controllers\User\TenagaKependidikanController::class, 'export_sarjana'])->name('rida-export-Tenaga Kependidikan Sarjana');

Route::get('/dokumentasi-rida/pilih_periode/tenaga-kependidikan/D4/{fakultas}/{tahun}', [App\Http\Controllers\User\TenagaKependidikanController::class, 'pilih_periode_d4'])->name('rida-periode-Tenaga Kependidikan D4');
Route::get('/dokumentasi-rida/detail/tenaga-kependidikan/D4/{fakultas}/{tahun}/{periode}', [App\Http\Controllers\User\TenagaKependidikanController::class, 'detail_d4'])->name('rida-detail-Tenaga Kependidikan D4');
Route::get('/dokumentasi-rida/export/tenaga-kependidikan/D4/{fakultas}/{tahun}', [App\Http\Controllers\User\TenagaKependidikanController::class, 'export_d4'])->name('rida-export-Tenaga Kependidikan D4');

Route::get('/dokumentasi-rida/pilih_periode/tenaga-kependidikan/D3/{fakultas}/{tahun}', [App\Http\Controllers\User\TenagaKependidikanController::class, 'pilih_periode_d3'])->name('rida-periode-Tenaga Kependidikan D3');
Route::get('/dokumentasi-rida/detail/tenaga-kependidikan/D3/{fakultas}/{tahun}/{periode}', [App\Http\Controllers\User\TenagaKependidikanController::class, 'detail_d3'])->name('rida-detail-Tenaga Kependidikan D3');
Route::get('/dokumentasi-rida/export/tenaga-kependidikan/D3/{fakultas}/{tahun}', [App\Http\Controllers\User\TenagaKependidikanController::class, 'export_d3'])->name('rida-export-Tenaga Kependidikan D3');

Route::get('/dokumentasi-rida/pilih_periode/tenaga-kependidikan/D2/{fakultas}/{tahun}', [App\Http\Controllers\User\TenagaKependidikanController::class, 'pilih_periode_d2'])->name('rida-periode-Tenaga Kependidikan D2');
Route::get('/dokumentasi-rida/detail/tenaga-kependidikan/D2/{fakultas}/{tahun}/{periode}', [App\Http\Controllers\User\TenagaKependidikanController::class, 'detail_d2'])->name('rida-detail-Tenaga Kependidikan D2');
Route::get('/dokumentasi-rida/export/tenaga-kependidikan/D2/{fakultas}/{tahun}', [App\Http\Controllers\User\TenagaKependidikanController::class, 'export_d2'])->name('rida-export-Tenaga Kependidikan D2');

Route::get('/dokumentasi-rida/pilih_periode/tenaga-kependidikan/D1/{fakultas}/{tahun}', [App\Http\Controllers\User\TenagaKependidikanController::class, 'pilih_periode_d1'])->name('rida-periode-Tenaga Kependidikan D1');
Route::get('/dokumentasi-rida/detail/tenaga-kependidikan/D1/{fakultas}/{tahun}/{periode}', [App\Http\Controllers\User\TenagaKependidikanController::class, 'detail_d1'])->name('rida-detail-Tenaga Kependidikan D1');
Route::get('/dokumentasi-rida/export/tenaga-kependidikan/D1/{fakultas}/{tahun}', [App\Http\Controllers\User\TenagaKependidikanController::class, 'export_d1'])->name('rida-export-Tenaga Kependidikan D1');

Route::get('/dokumentasi-rida/pilih_periode/tenaga-kependidikan/SLTA/{fakultas}/{tahun}', [App\Http\Controllers\User\TenagaKependidikanController::class, 'pilih_periode_slta'])->name('rida-periode-Tenaga Kependidikan SLTA');
Route::get('/dokumentasi-rida/detail/tenaga-kependidikan/SLTA/{fakultas}/{tahun}/{periode}', [App\Http\Controllers\User\TenagaKependidikanController::class, 'detail_slta'])->name('rida-detail-Tenaga Kependidikan SLTA');
Route::get('/dokumentasi-rida/export/tenaga-kependidikan/SLTA/{fakultas}/{tahun}', [App\Http\Controllers\User\TenagaKependidikanController::class, 'export_slta'])->name('rida-export-Tenaga Kependidikan SLTA');

Route::get('/dokumentasi-rida/pilih_periode/tenaga-kependidikan/SLTP/{fakultas}/{tahun}', [App\Http\Controllers\User\TenagaKependidikanController::class, 'pilih_periode_sltp'])->name('rida-periode-Tenaga Kependidikan SLTP');
Route::get('/dokumentasi-rida/detail/tenaga-kependidikan/SLTP/{fakultas}/{tahun}/{periode}', [App\Http\Controllers\User\TenagaKependidikanController::class, 'detail_sltp'])->name('rida-detail-Tenaga Kependidikan SLTP');
Route::get('/dokumentasi-rida/export/tenaga-kependidikan/SLTP/{fakultas}/{tahun}', [App\Http\Controllers\User\TenagaKependidikanController::class, 'export_sltp'])->name('rida-export-Tenaga Kependidikan SLTP');

Route::get('/dokumentasi-rida/pilih_periode/tenaga-kependidikan/SD/{fakultas}/{tahun}', [App\Http\Controllers\User\TenagaKependidikanController::class, 'pilih_periode_sd'])->name('rida-periode-Tenaga Kependidikan SD');
Route::get('/dokumentasi-rida/detail/tenaga-kependidikan/SD/{fakultas}/{tahun}/{periode}', [App\Http\Controllers\User\TenagaKependidikanController::class, 'detail_sd'])->name('rida-detail-Tenaga Kependidikan SD');
Route::get('/dokumentasi-rida/export/tenaga-kependidikan/SD/{fakultas}/{tahun}', [App\Http\Controllers\User\TenagaKependidikanController::class, 'export_sd'])->name('rida-export-Tenaga Kependidikan SD');

/*detail grafik 17-22*/ 

Route::get('/dokumentasi-rida/pilih_periode/usia-produktif/peneliti-pengabdi/Doktor/{fakultas}/{tahun}', [App\Http\Controllers\User\RidaController::class, 'pilih_periode_doktor'])->name('rida-periode-Usia Produktif Doktor');
Route::get('/dokumentasi-rida/detail/usia-produktif/peneliti-pengabdi/Doktor/{fakultas}/{tahun}/{periode}', [App\Http\Controllers\User\RidaController::class, 'detail_doktor'])->name('rida-detail-Rentang Usia Produktif Peneliti dan Pengabdi Jenjang Doktor');

Route::get('/dokumentasi-rida/pilih_periode/usia-produktif/peneliti-pengabdi/Magister/{fakultas}/{tahun}', [App\Http\Controllers\User\RidaController::class, 'pilih_periode_magister'])->name('rida-periode-Usia Produktif Magister');
Route::get('/dokumentasi-rida/detail/usia-produktif/peneliti-pengabdi/Magister/{fakultas}/{tahun}/{periode}', [App\Http\Controllers\User\RidaController::class, 'detail_magister'])->name('rida-detail-Rentang Usia Produktif Peneliti dan Pengabdi Jenjang Magister');

Route::get('/dokumentasi-rida/pilih_periode/usia-produktif/peneliti-pengabdi/SP-2/{fakultas}/{tahun}', [App\Http\Controllers\User\RidaController::class, 'pilih_periode_sp2'])->name('rida-periode-Usia Produktif SP2');
Route::get('/dokumentasi-rida/detail/usia-produktif/peneliti-pengabdi/SP-2/{fakultas}/{tahun}/{periode}', [App\Http\Controllers\User\RidaController::class, 'detail_sp2'])->name('rida-detail-Rentang Usia Produktif Peneliti dan Pengabdi Jenjang SP-2');

Route::get('/dokumentasi-rida/pilih_periode/usia-produktif/peneliti-pengabdi/Profesi/{fakultas}/{tahun}', [App\Http\Controllers\User\RidaController::class, 'pilih_periode_profesi'])->name('rida-periode-Usia Produktif Profesi');
Route::get('/dokumentasi-rida/detail/usia-produktif/peneliti-pengabdi/Profesi/{fakultas}/{tahun}/{periode}', [App\Http\Controllers\User\RidaController::class, 'detail_profesi'])->name('rida-detail-Rentang Usia Produktif Peneliti dan Pengabdi Jenjang Profesi');

Route::get('/dokumentasi-rida/pilih_periode/usia-produktif/peneliti-pengabdi/SP-1/{fakultas}/{tahun}', [App\Http\Controllers\User\RidaController::class, 'pilih_periode_sp1'])->name('rida-periode-Usia Produktif SP1');
Route::get('/dokumentasi-rida/detail/usia-produktif/peneliti-pengabdi/SP-1/{fakultas}/{tahun}/{periode}', [App\Http\Controllers\User\RidaController::class, 'detail_sp1'])->name('rida-detail-Rentang Usia Produktif Peneliti dan Pengabdi Jenjang SP-1');

Route::get('/dokumentasi-rida/pilih_periode/usia-produktif/peneliti-pengabdi/SP-1(K)/{fakultas}/{tahun}', [App\Http\Controllers\User\RidaController::class, 'pilih_periode_sp1k'])->name('rida-periode-Usia Produktif SP-1(K)');
Route::get('/dokumentasi-rida/detail/usia-produktif/peneliti-pengabdi/SP-1(K)/{fakultas}/{tahun}/{periode}', [App\Http\Controllers\User\RidaController::class, 'detail_sp1k'])->name('rida-detail-Rentang Usia Produktif Peneliti dan Pengabdi Jenjang SP-1(K)');

Route::get('/dokumentasi-rida/skema-pnbp/{skema}/{tahun}', [App\Http\Controllers\User\SkemaPNBPController::class, 'detailsFront'])->name('skemapnbp-details-front');

Route::get('/dokumentasi-rida/pilih_periode/hibah-pnbp/{fakultas}/{tahun}', [App\Http\Controllers\User\HibahPNBPController::class, 'periode'])->name('rida-periode-hibah-pnbp');
Route::get('/dokumentasi-rida/export/hibah-pnbp/{fakultas}/{tahun}', [App\Http\Controllers\User\HibahPNBPController::class, 'export'])->name('rida-export-hibah-pnbp');


// Route::get('/njajal', function () {
//     dd(\App\Models\Post::find(1)->category[0]->category);
// });

Route::get('/{slug}', [App\Http\Controllers\User\LppmController::class, 'page'])->name('userpage');
Route::get('/{slug}/{sub}', [App\Http\Controllers\User\LppmController::class, 'submenu'])->name('subs');
