<?php

use Illuminate\Http\Request;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PemeriksaanPasienController;
use App\Http\Controllers\PendaftaranPasienController;
use App\Http\Controllers\PoliController;

Route::get('/', function () {
    return redirect('pasien/index');
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
    Route::controller(PasienController::class)->group(function () {
        Route::prefix('pasien')->group(function () {
            Route::name('pasien.')->group(function () {
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

    Route::controller(PoliController::class)->group(function () {
        Route::prefix('poli')->group(function () {
            Route::name('poli.')->group(function () {
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
                Route::get('edit/{id}', 'edit')->name('edit');
                Route::post('store', 'storeDokter')->name('storedokter');
                Route::get('editadmin/{id}', 'editAdmin')->name('editadmin');
            });
        });
    });

    Route::controller(ObatController::class)->group(function () {
        Route::prefix('obat')->group(function () {
            Route::name('obat.')->group(function () {
                Route::get('index', 'index')->name('index');
                Route::get('add', 'create')->name('create');
                Route::get('ajaxget', 'get_obat')->name('ajaxget');
                // Route::get('show/{id}', 'show')->name('show');
                Route::get('edit/{id}', 'edit')->name('edit');
                Route::post('store', 'store')->name('store');
                Route::put('update/{id}', 'update')->name('update');
                Route::delete('delete/{id}', 'delete')->name('delete');
            });
        });
    });
   
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

