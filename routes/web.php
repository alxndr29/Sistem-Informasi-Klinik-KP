<?php

use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\FarmasiController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\TindakanController;
use Illuminate\Http\Request;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PemeriksaanPasienController;
use App\Http\Controllers\PendaftaranPasienController;
use App\Http\Controllers\PiutangController;
use App\Http\Controllers\PoliController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;


Route::get('/', function () {
    return redirect()->route('dashboard.index');
})->name('/');

//Language Change
Route::get('lang/{locale}', function ($locale) {
    if (!in_array($locale, ['en', 'de', 'es', 'fr', 'pt', 'cn', 'ae'])) {
        abort(400);
    }
    Session()->put('locale', $locale);
    Session::get('locale');
    return redirect()->back();
})->name('lang');

Route::view('sample-page', 'pages.sample-page')->name('sample-page');
Route::view('landing-page', 'pages.landing-page')->name('landing-page');

Route::prefix('others')->group(function () {
    Route::view('400', 'errors.400')->name('error-400');
    Route::view('401', 'errors.401')->name('error-401');
    Route::view('403', 'errors.403')->name('error-403');
    Route::view('404', 'errors.404')->name('error-404');
    Route::view('500', 'errors.500')->name('error-500');
    Route::view('503', 'errors.503')->name('error-503');
});

Route::get('/clear-cache', function () {
    Artisan::call('config:cache');
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    return "Cache is cleared";
})->name('clear.cache');

// Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware(['auth'])->group(function () {
    Route::resource('dashboard',HomeController::class);
    Route::prefix('manajemen-klinik')->group(function () {
        Route::resource('tindakan',HomeController::class);
        Route::resource('poli',PoliController::class);
    });

    Route::prefix('pelayanan')->group(function () {
        Route::resource('pasien',PasienController::class);
        Route::resource('pendaftaran-pasien',PendaftaranPasienController::class);
        Route::resource('pemeriksaan-pasien',PemeriksaanPasienController::class);
    });
    Route::prefix('laporan')->group(function (){
        Route::get('keuangan',[LaporanController::class,'keuangan'])->name('keuangan');
        Route::get('piutang',[LaporanController::class,'piutang'])->name('piutang');
        Route::get('cashflow',[LaporanController::class, 'cashflow'])->name('cashflow');
    });
    Route::prefix('produk')->group(function (){
        Route::resource('daftar-produk',ObatController::class);
        Route::resource('kategori', KategoriController::class);
    });
    Route::prefix('manajemen-user')->group(function (){
        Route::resource('user-pengguna',UserController::class);
        Route::resource('daftar-dokter',DokterController::class);
    });
    Route::prefix('farmasi')->group(function (){
        Route::get('stok-barang',[FarmasiController::class,'stokBarang'])->name('stok-barang');
        Route::get('obat-masuk',[FarmasiController::class,'obatMasuk'])->name('obat-masuk');
        Route::get('obat-keluar',[FarmasiController::class, 'obatKeluar'])->name('obat-keluar');
    });
    Route::controller(PasienController::class)->group(function () {
        Route::prefix('pasien')->group(function () {
            Route::name('pasien.')->group(function () {
                Route::get('daftar-pasien', 'index')->name('index');
                Route::get('add', 'create')->name('create');
                Route::get('show/{id}', 'show')->name('show');
                Route::get('edit/{id}', 'edit')->name('edit');
                Route::post('store', 'store')->name('store');
                Route::put('update/{id}', 'update')->name('update');
                Route::delete('delete/{id}', 'delete')->name('delete');
            });
        });
    });

    Route::controller(DokterController::class)->group(function () {
        Route::prefix('dokter')->group(function () {
            Route::name('dokter.')->group(function () {
                Route::get('index', 'index')->name('index');
                Route::get('add', 'create')->name('create');
                Route::get('show/{id}', 'show')->name('show');
                Route::get('edit/{id}', 'edit')->name('edit');
                Route::post('store', 'store')->name('store');
                Route::put('update/{id}', 'update')->name('update');
                Route::delete('delete/{id}', 'delete')->name('delete');
            });
        });
    });


//    Route::controller(PoliController::class)->group(function () {
//        Route::prefix('poli')->group(function () {
//            Route::name('poli.')->group(function () {
//                Route::get('index', 'index')->name('index');
//                Route::get('add', 'create')->name('create');
//                Route::get('show/{id}', 'show')->name('show');
//                Route::get('edit/{id}', 'edit')->name('edit');
//                Route::post('store', 'store')->name('store');
//                Route::put('update/{id}', 'update')->name('update');
//                Route::delete('delete/{id}', 'delete')->name('delete');
//            });
//        });
//    });

    Route::controller(PendaftaranPasienController::class)->group(function () {
        Route::prefix('pendaftaran')->group(function () {
            Route::name('pendaftaran.')->group(function () {
                Route::get('index', 'index')->name('index');
                Route::post('store', 'store')->name('store');
            });
        });
    });

    Route::controller(PemeriksaanPasienController::class)->group(function () {
        Route::prefix('pemeriksaan')->group(function () {
            Route::name('pemeriksaan.')->group(function () {
                Route::get('index', 'index')->name('index');
                Route::get('edit/{id}', 'edit')->name('edit')->middleware('doktercheck');
                Route::get('bayar/{id}', 'bayar')->name('bayar');
                Route::put('bayarput/{id}', 'bayarput')->name('bayarput');
                Route::post('store', 'storeDokter')->name('storedokter');
                Route::get('editadmin/{id}', 'editAdmin')->name('editadmin');
            });
        });
    });

    Route::controller(ObatController::class)->group(function () {
        Route::prefix('obat')->group(function () {
            Route::name('obat.')->group(function () {
                Route::get('index', 'index')->name('index');
                Route::get('index/add', 'create')->name('create');
                Route::get('ajaxget', 'get_obat')->name('ajaxget');
                Route::get('index/tambahstok','tambahstok')->name('tambahstok');
                Route::post('tambahstokpost', 'tambahstokpost')->name('tambahstokpost');
                Route::get('edit/{id}', 'edit')->name('edit');
                Route::post('store', 'store')->name('store');
                Route::put('update/{id}', 'update')->name('update');
                Route::delete('delete/{id}', 'delete')->name('delete');
                Route::get('obatmasuk/{awal?}/{akhir?}', 'obatmasuk')->name('obatmasuk');
                Route::get('obatkeluar/{awal?}/{akhir?}', 'obatkeluar')->name('obatkeluar');
            });
        });
    });

    Route::controller(UserController::class)->group(function () {
        Route::prefix('user')->group(function () {
            Route::name('user.')->group(function () {
                Route::get('index', 'index')->name('index');
                Route::get('create', 'create')->name('create');
                Route::get('edit/{id}', 'edit')->name('edit');
                Route::post('store', 'store')->name('store');
                Route::put('update/{id}', 'update')->name('update');
            });
        });
    });

    Route::controller(PiutangController::class)->group(function () {
        Route::prefix('piutang')->group(function () {
            Route::name('piutang.')->group(function () {
                Route::get('index', 'index')->name('index');
                Route::get('edit/{id}', 'edit')->name('edit');
                Route::put('update/{id}', 'update')->name('update');
            });
        });
    });

    Route::controller(LaporanController::class)->group(function () {
        Route::prefix('laporan')->group(function () {
            Route::name('laporan.')->group(function () {
                Route::get('index/{tahun?}/{bulan?}', 'indexLaporanKeungan')->name('index');
                Route::get('show/{id}', 'showDetailLaporanKeuangan')->name('edit');
            });
        });
    });
});

Auth::routes();


