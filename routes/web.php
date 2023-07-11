<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\AudienceController;
use App\Http\Controllers\DaftarKelasSenamController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\DiskonController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\KelasSenamController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PelatihController;
use App\Http\Controllers\PemasukkanController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\HistoryController;
use Illuminate\Support\Facades\Route;

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


Route::get('/', [HomeController::class, 'index'])->name('homepage');

Route::get('pelatih/{id}',[HomeController::class,'pelatih'])->name('pelatih');

Route::group(['prefix' => 'event'], function(){
    Route::get('{id}',[HomeController::class,'event'])->name('event');
    Route::post('{id}',[HomeController::class,'event_daftar'])->name('event_daftar');

});

Route::get('cek_nomor',[HomeController::class,'cek_nomor'])->name('cek_nomor');

Route::group(['prefix' => 'kelas'], function(){
    Route::get('{id}',[HomeController::class,'kelas'])->name('kelas');
    
});

Route::get('register', [RegisterController::class, 'index'])->name('register');
Route::post('register', [RegisterController::class, 'store'])->name('registerPost');

Route::get('login', [LoginController::class, 'index'])->name('loginpage');
Route::post('login', [LoginController::class, 'login'])->name('login');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

// Route::get('/payment/process', 'PaymentController@process')->name('payment.process');

Route::group(['middleware' => ['web', 'auth', 'roles']], function(){
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::group(['roles' => 'Pemilik', 'prefix' => 'Pemilik'], function(){
        // Module Pelatih
        Route::group(['prefix' => 'Pelatih'], function(){
            Route::get('', [PelatihController::class, 'index'])->name('pelatih');
            Route::get('detail/{id}', [PelatihController::class, 'detail'])->name('pelatih.detail');
        });

        // Module Anggota
        Route::group(['prefix' => 'Anggota'], function(){
            Route::get('', [AnggotaController::class, 'index'])->name('anggota');
            Route::get('detail/{id}', [AnggotaController::class, 'detail'])->name('anggota.detail');
        });

        // Module Audience
        Route::group(['prefix' => 'Audience'], function(){
            Route::get('', [AudienceController::class, 'index'])->name('audience');
            Route::get('detail/{id}', [AudienceController::class, 'detail'])->name('audience.detail');
        });

        // Module Pemasukkan
        Route::group(['prefix' => 'Pemasukkan'], function(){
            Route::get('', [PemasukkanController::class, 'index'])->name('pemasukkan');
        });
    });

    Route::group(['roles' => 'Admin', 'prefix' => 'Admin'], function(){
        // Module Pelatih
        Route::group(['prefix' => 'Pelatih'], function(){
            Route::get('', [PelatihController::class, 'index'])->name('a.pelatih');
            Route::get('data', [PelatihController::class, 'indexData'])->name('a.pelatih.data');
            Route::get('tambah-data', [PelatihController::class, 'insert'])->name('a.pelatih.add');
            Route::post('simpan-data', [PelatihController::class, 'store'])->name('a.pelatih.store');
            Route::get('{uuid}', [PelatihController::class, 'edit'])->name('a.pelatih.edit');
            Route::put('{uuid}', [PelatihController::class, 'update'])->name('a.pelatih.update');
            Route::delete('delete/{uuid}', [PelatihController::class, 'destroy'])->name('a.pelatih.delete');
        });

        // Module Anggota
        Route::group(['prefix' => 'Anggota'], function(){
            Route::get('', [AnggotaController::class, 'index'])->name('a.anggota');
            Route::get('tambah-data', [AnggotaController::class, 'insert'])->name('a.anggota.add');
            Route::post('simpan-data', [AnggotaController::class, 'store'])->name('a.anggota.store');
            Route::get('{uuid}', [AnggotaController::class, 'edit'])->name('a.anggota.edit');
            Route::put('{uuid}', [AnggotaController::class, 'update'])->name('a.anggota.update');
            Route::delete('delete/{uuid}', [AnggotaController::class, 'destroy'])->name('a.anggota.delete');
        });

        // Module Jadwal
        Route::group(['prefix' => 'Jadwal'], function(){
            Route::get('', [JadwalController::class, 'index'])->name('a.jadwal');
            Route::get('tambah-data', [JadwalController::class, 'insert'])->name('a.jadwal.add');
            Route::post('simpan-data', [JadwalController::class, 'store'])->name('a.jadwal.store');
            Route::get('{uuid}', [JadwalController::class, 'edit'])->name('a.jadwal.edit');
            Route::put('{uuid}', [JadwalController::class, 'update'])->name('a.jadwal.update');
            Route::delete('delete/{uuid}', [JadwalController::class, 'destroy'])->name('a.jadwal.delete');
        });

        // Module Kelas Senam
        Route::group(['prefix' => 'Kelas-Senam'], function(){
            Route::get('', [KelasSenamController::class, 'index'])->name('a.kelassenam');
            Route::get('tambah-data', [KelasSenamController::class, 'insert'])->name('a.kelassenam.add');
            Route::post('simpan-data', [KelasSenamController::class, 'store'])->name('a.kelassenam.store');
            Route::get('{uuid}', [KelasSenamController::class, 'edit'])->name('a.kelassenam.edit');
            Route::put('{uuid}', [KelasSenamController::class, 'update'])->name('a.kelassenam.update');
            Route::delete('delete/{uuid}', [KelasSenamController::class, 'destroy'])->name('a.kelassenam.delete');
        });

        // Module Pembayaran
        Route::group(['prefix' => 'Pembayaran'], function(){
            Route::get('', [PembayaranController::class, 'index'])->name('a.pembayaran');
            Route::put('konfirmasi/{id}', [PembayaranController::class, 'acceptPayment'])->name('a.pembayaran.konfirmasi');
            Route::put('penolakan/{id}', [PembayaranController::class, 'rejectPayment'])->name('a.pembayaran.penolakan');
        });

        // Module Event
        Route::group(['prefix' => 'Event'], function(){
            Route::get('', [EventController::class, 'index'])->name('a.event');
            Route::get('tambah-data', [EventController::class, 'insert'])->name('a.event.add');
            Route::post('simpan-data', [EventController::class, 'store'])->name('a.event.store');
            Route::get('{uuid}', [EventController::class, 'edit'])->name('a.event.edit');
            Route::put('{uuid}', [EventController::class, 'update'])->name('a.event.update');
            Route::delete('delete/{uuid}', [EventController::class, 'destroy'])->name('a.event.delete');
        });

        // Module Diskon
        Route::group(['prefix' => 'Diskon'], function(){
            Route::get('', [DiskonController::class, 'index'])->name('a.diskon');
            Route::get('tambah-data', [DiskonController::class, 'insert'])->name('a.diskon.add');
            Route::post('simpan-data', [DiskonController::class, 'store'])->name('a.diskon.store');
            Route::get('{uuid}', [DiskonController::class, 'edit'])->name('a.diskon.edit');
            Route::put('{uuid}', [DiskonController::class, 'update'])->name('a.diskon.update');
            Route::delete('delete/{uuid}', [DiskonController::class, 'destroy'])->name('a.diskon.delete');
        });
    });

Route::group(['roles' => 'Pelatih', 'prefix' => 'Pelatih'], function(){
        // Module Anggota
    Route::group(['prefix' => 'Anggota'], function(){
        Route::get('', [AnggotaController::class, 'index'])->name('p.anggota');
    });

        // Module Event
    Route::group(['prefix' => 'Event'], function(){
        Route::get('', [EventController::class, 'index'])->name('p.event');
    });

        // Module Pemasukkan
    Route::group(['prefix' => 'Pemasukkan'], function(){
        Route::get('', [PemasukkanController::class, 'index'])->name('p.pemasukkan');
    });
});

Route::group(['roles' => 'Member', 'prefix' => 'Member'], function(){
        // Module Kelas Senam
    Route::group(['prefix' => 'Kelas-Senam'], function(){
        Route::get('', [KelasSenamController::class, 'index'])->name('m.kelassenam');
    });

        // Module Pelatih
    Route::group(['prefix' => 'Pelatih'], function(){
        Route::get('', [PelatihController::class, 'index'])->name('m.pelatih');
    });

        // Module Event
    Route::group(['prefix' => 'Event'], function(){
        Route::get('', [EventController::class, 'index'])->name('m.event');
        Route::post('{jadwal}/tambah', [EventController::class, 'tambah_event'])->name('m.add_event');
        Route::delete('{jadwal}/batal', [EventController::class, 'delete_event'])->name('m.delete_event');
    });

        // Module Anggota
    Route::group(['prefix' => 'Daftar-Kelas-Senam'], function(){
        Route::get('', [DaftarKelasSenamController::class, 'index'])->name('m.daftarKelas');
        Route::get('{jadwal}/tambah', [DaftarKelasSenamController::class, 'get_tambah_jadwal_user'])->name('m.get_jadwal_id_user');
        Route::post('{jadwal}/tambah', [DaftarKelasSenamController::class, 'tambah_jadwal_user'])->name('m.add_jadwal_id_user');
        Route::delete('{jadwal}/batal', [DaftarKelasSenamController::class, 'delete_jadwal_user'])->name('m.delete_jadwal_id_user');
        Route::patch('{jadwal}/tambah', [DaftarKelasSenamController::class, 'store_jadwal_user'])->name('m.store_jadwal_id_user');
        Route::get('tambah-data', [DaftarKelasSenamController::class, 'insert'])->name('m.daftarKelas.add');
        Route::post('simpan-data', [DaftarKelasSenamController::class, 'store'])->name('m.daftarKelas.store');
        Route::get('{uuid}', [DaftarKelasSenamController::class, 'edit'])->name('m.daftarKelas.edit');
            // batalkan
        Route::delete('delete/{uuid}', [DaftarKelasSenamController::class, 'destroy'])->name('m.daftarKelas.delete');
    });

        // Module Pembayaran
    Route::group(['prefix' => 'Pembayaran'], function(){
        Route::get('', [PembayaranController::class, 'index'])->name('m.pembayaran');
    });

    Route::group(['prefix' => 'History'], function(){
        Route::get('kelas', [HistoryController::class, 'kelas'])->name('m.kelas_history');
        Route::get('event', [HistoryController::class, 'event'])->name('m.event_history');
    });
});

Route::group(['roles' => 'Non-Member', 'prefix' => 'Non-Member'], function(){
        // Module Kelas Senam
    Route::group(['prefix' => 'Kelas-Senam'], function(){
        Route::get('', [KelasSenamController::class, 'index'])->name('nm.kelassenam');
    });

        // Module Pelatih
    Route::group(['prefix' => 'Pelatih'], function(){
        Route::get('', [PelatihController::class, 'index'])->name('nm.pelatih');
    });

        // Module Daftar Kelas
    Route::group(['prefix' => 'Daftar-Kelas-Senam'], function(){
        Route::get('', [DaftarKelasSenamController::class, 'index'])->name('nm.daftarKelas');
        Route::get('tambah-data/{id}', [DaftarKelasSenamController::class, 'insert'])->name('nm.daftarKelas.add');
        Route::post('simpan-data', [DaftarKelasSenamController::class, 'store'])->name('nm.daftarKelas.store');
        Route::get('{uuid}', [DaftarKelasSenamController::class, 'edit'])->name('nm.daftarKelas.edit');
            // batalkan
        Route::delete('delete/{uuid}', [DaftarKelasSenamController::class, 'destroy'])->name('nm.daftarKelas.delete');
    });

        // Module Pembayaran
    Route::group(['prefix' => 'Pembayaran'], function(){
        Route::get('', [PembayaranController::class, 'index'])->name('nm.pembayaran');
    });
});
});
