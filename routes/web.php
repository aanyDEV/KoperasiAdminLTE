<?php

use App\Http\Controllers\cetakBukubesar;
use App\Http\Controllers\cetakLabarugi;
use App\Http\Controllers\cetakLembarpemeriksaan;
use App\Http\Controllers\cetakMemorialpemindahpembukuan;
use App\Http\Controllers\cetakNeraca;
use App\Http\Controllers\cetakNeracaaktifapasifa;
use App\Http\Controllers\cetakNeracalajur;
use App\Http\Controllers\cetakLaporanmanagement;
use App\Http\Controllers\cetakMemorialsaldoawal;
use App\Http\Controllers\cetakRekeningkoran;
use App\Http\Controllers\cetakRincianbiaya;
use App\Http\Controllers\cetakSeluruhkbb;
// ======================================================================================================================================================================
use App\Http\Controllers\rabthiniDatatables;
use App\Http\Controllers\prosessaldoawalDatatables;
use App\Http\Controllers\noperkiraanDatatables;
use App\Http\Controllers\memopenutupDatatables;
use App\Http\Controllers\kasbankDatatables;
use App\Http\Controllers\memosuplementDatatables;
use App\Http\Controllers\memorialDatatables;
// ======================================================================================================================================================================
use App\Http\Controllers\kasbankController;
use App\Http\Controllers\memopenutupController;
use App\Http\Controllers\memosuplementController;
use App\Http\Controllers\memorialController;
use App\Http\Controllers\rabthiniController;
use App\Http\Controllers\prosessaldoawalController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\noperkiraanController;
use App\Http\Controllers\LoginController;
// ======================================================================================================================================================================
use Illuminate\Support\Facades\Route;

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::get('locale/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);
    return redirect()->back();
})->name('locale');

Route::get('/forgot-password', [LoginController::class, 'forgot_password'])->name('forgot-password');
Route::post('/forgot-password-act', [LoginController::class, 'forgot_password_act'])->name('forgot-password-act');

Route::get('/validasi-forgot-password/{token}', [LoginController::class, 'validasi_forgot_password'])->name('validasi-forgot-password');
Route::post('/validasi-forgot-password-act', [LoginController::class, 'validasi_forgot_password_act'])->name('validasi-forgot-password-act');

Route::post('/login-proses', [LoginController::class, 'login_proses'])->name('login-proses');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/register-proses', [LoginController::class, 'register_proses'])->name('register-proses');

Route::group(['prefix' => 'admin', 'middleware' => ['auth'], 'as' => 'admin.'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::group(['prefix' => 'noperkiraan', 'middleware' => ['auth'], 'as' => 'np.'], function () {
        Route::get('/', [noperkiraanController::class, 'index'])->name('index');
        Route::get('/assets', [noperkiraanController::class, 'assets'])->name('assets');
        Route::post('/import', [noperkiraanController::class, 'import'])->name('import');
        Route::get('/create', [noperkiraanController::class, 'create'])->name('create');
        Route::post('/store', [noperkiraanController::class, 'store'])->name('store');
        Route::get('/api/np/{noper}', [noperkiraanController::class, 'api']);
        Route::get('/edit/{id}', [noperkiraanController::class, 'edit'])->name('edit');
        Route::get('/detail/{id}', [noperkiraanController::class, 'detail'])->name('detail');
        Route::put('/update/{id}', [noperkiraanController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [noperkiraanController::class, 'delete'])->name('delete');
    });

    Route::group(['prefix' => 'prosessaldoawal', 'middleware' => ['auth'], 'as' => 'psa.'], function () {
        Route::get('/', [prosessaldoawalController::class, 'index'])->name('index');
        Route::get('/assets', [prosessaldoawalController::class, 'assets'])->name('assets');
        Route::get('/create', [prosessaldoawalController::class, 'create'])->name('create');
        Route::post('/import', [prosessaldoawalController::class, 'import'])->name('import');
        Route::post('/store', [prosessaldoawalController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [prosessaldoawalController::class, 'edit'])->name('edit');
        Route::get('/detail/{id}', [prosessaldoawalController::class, 'detail'])->name('detail');
        Route::put('/update/{id}', [prosessaldoawalController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [prosessaldoawalController::class, 'delete'])->name('delete');
    });

    Route::group(['prefix' => 'rabthini', 'middleware' => ['auth'], 'as' => 'rti.'], function () {
        Route::get('/', [rabthiniController::class, 'index'])->name('index');
        Route::get('/assets', [rabthiniController::class, 'assets'])->name('assets');
        Route::post('/import', [rabthiniController::class, 'import'])->name('import');
        Route::get('/create', [rabthiniController::class, 'create'])->name('create');
        Route::post('/store', [rabthiniController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [rabthiniController::class, 'edit'])->name('edit');
        Route::get('/detail/{id}', [rabthiniController::class, 'detail'])->name('detail');
        Route::put('/update/{id}', [rabthiniController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [rabthiniController::class, 'delete'])->name('delete');
    });
    
    Route::group(['prefix' => 'memorial', 'middleware' => ['auth'], 'as' => 'mr.'], function() {
        Route::get('/', [memorialController::class, 'index'])->name('index');
        Route::get('/assets', [memorialController::class, 'assets'])->name('assets');
        Route::get('/create', [memorialController::class, 'create'])->name('create');
        Route::post('/store', [memorialController::class, 'store'])->name('store');
        Route::post('/import', [memorialController::class, 'import'])->name('import');
        Route::get('/edit/{id}', [memorialController::class, 'edit'])->name('edit');
        Route::get('/detail/{id}', [memorialController::class, 'detail'])->name('detail');
        Route::put('/update/{id}', [memorialController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [memorialController::class, 'delete'])->name('delete');
    });

    Route::group(['prefix' => 'memosuplement', 'middleware' => ['auth'], 'as' => 'ms.'], function() {
        Route::get('/', [memosuplementController::class, 'index'])->name('index');
        Route::get('/assets', [memosuplementController::class, 'assets'])->name('assets');
        Route::get('/create', [memosuplementController::class, 'create'])->name('create');
        Route::post('/store', [memosuplementController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [memosuplementController::class, 'edit'])->name('edit');
        Route::get('/detail/{id}', [memosuplementController::class, 'detail'])->name('detail');
        Route::put('/update/{id}', [memosuplementController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [memosuplementController::class, 'delete'])->name('delete');
    });
    
    Route::group(['prefix' => 'memopenutup', 'middleware' => ['auth'], 'as' => 'mp.'], function() {
        Route::get('/', [memopenutupController::class, 'index'])->name('index');
        Route::get('/assets', [memopenutupController::class, 'assets'])->name('assets');
        Route::get('/create', [memopenutupController::class, 'create'])->name('create');
        Route::post('/store', [memopenutupController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [memopenutupController::class, 'edit'])->name('edit');
        Route::get('/detail/{id}', [memopenutupController::class, 'detail'])->name('detail');
        Route::put('/update/{id}', [memopenutupController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [memopenutupController::class, 'delete'])->name('delete');
    });

    Route::group(['prefix' => 'kasbank', 'middleware' => ['auth'], 'as' => 'kb.'], function() {
        Route::get('/', [kasbankController::class, 'index'])->name('index');
        Route::get('/assets', [kasbankController::class, 'assets'])->name('assets');
        Route::get('/create', [kasbankController::class, 'create'])->name('create');
        Route::get('/api/kb/{no_bukti}', [kasbankController::class, 'api']);
        Route::post('/import', [kasbankController::class, 'import'])->name('import');
        Route::post('/store', [kasbankController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [kasbankController::class, 'edit'])->name('edit');
        Route::get('/detail/{id}', [kasbankController::class, 'detail'])->name('detail');
        Route::put('/update/{id}', [kasbankController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [kasbankController::class, 'delete'])->name('delete');
    });

    Route::group(['prefix' => 'cetak', 'middleware' => ['auth'], 'as' => 'cetak.'], function() {
        Route::get("/laba_rugi",[cetakLabarugi::class,'index'])->name('lr');
        Route::get("/laba_rugi/view",[cetakLabarugi::class,'indexview'])->name('lr.view');
        Route::get("/lembar_pemeriksaan",[cetakLembarpemeriksaan::class,'index'])->name('lp');
        Route::get("/lembar_pemeriksaan/view",[cetakLembarpemeriksaan::class,'indexview'])->name('lp.view');
        Route::get("/buku_besar",[cetakBukubesar::class,'index'])->name('bb');
        Route::get("/buku_besar/view",[cetakBukubesar::class,'indexview'])->name('bb.view');
        Route::get("/seluruh_kartu_bukubesar",[cetakSeluruhkbb::class,'index'])->name('skbb');
        Route::get("/seluruh_kartu_bukubesar/view",[cetakSeluruhkbb::class,'indexview'])->name('skbb.view');
        Route::get("/neraca",[cetakNeraca::class,'index'])->name('nr');
        Route::get("/neraca/view",[cetakNeraca::class,'indexview'])->name('nr.view');
        Route::get("/neraca_aktifa_pasifa",[cetakNeracaaktifapasifa::class,'index'])->name('nap');
        Route::get("/neraca_aktifa_pasifa/view",[cetakNeracaaktifapasifa::class,'indexview'])->name('nap.view');
        Route::get("/neraca_lajur",[cetakNeracalajur::class,'index'])->name('nl');
        Route::get("/neraca_lajur/view",[cetakNeracalajur::class,'indexview'])->name('nl.view');
        Route::get("/rincian_biaya",[cetakRincianbiaya::class,'index'])->name('rb');
        Route::get("/rincian_biaya/view",[cetakRincianbiaya::class,'indexview'])->name('rb.view');
        Route::get("/rekening_koran/urut_tanggal",[cetakRekeningkoran::class,'index2'])->name('rut');
        Route::get("/rekening_koran/urut_no_perkiraan",[cetakRekeningkoran::class,'index'])->name('rnoper');
        Route::get("/memorial_pemindah_bukuan",[cetakMemorialpemindahpembukuan::class,'index'])->name('mpb');
        Route::get("/memorial_pemindah_bukuan/view",[cetakMemorialpemindahpembukuan::class,'indexview'])->name('mpb.view');
        Route::get("/memorial_saldo_awal",[cetakMemorialsaldoawal::class,'index'])->name('msa');
        Route::get("/memorial_saldo_awal/view",[cetakMemorialsaldoawal::class,'indexview'])->name('msa.view');
        Route::get("/laporan_management",[cetakLaporanmanagement::class,'index'])->name('lm');
    });
 
});