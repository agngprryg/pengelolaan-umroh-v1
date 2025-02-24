<?php

// Controllers

use App\Http\Controllers\BankPenerimaSetoranController;
use App\Http\Controllers\BiayaRegistrasiHajiController;
use App\Http\Controllers\CetakAmplopController;
use App\Http\Controllers\DataAgenController;
use App\Http\Controllers\DataCabangController;
use App\Http\Controllers\DataOpsiController;
use App\Http\Controllers\DataPenggunaController;
use App\Http\Controllers\DataPerlengkapanUmrohController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JadwalKeberangkatanController;
use App\Http\Controllers\JenisOpsiController;
use App\Http\Controllers\KelengkapanRegistrasiHajiController;
use App\Http\Controllers\KelengkapanRegistrasiUmrohController;
use App\Http\Controllers\MerchandiseUmrohController;
use App\Http\Controllers\PaketUmrohController;
use App\Http\Controllers\PembayaranHajiController;
use App\Http\Controllers\RegistrasiHajiController;
use App\Http\Controllers\RegistrasiUmrohController;
use App\Http\Controllers\RekeningBankController;
use App\Http\Controllers\Security\RolePermission;
use App\Http\Controllers\Security\RoleController;
use App\Http\Controllers\Security\PermissionController;
use App\Http\Controllers\SettingHotelController;
use App\Http\Controllers\SettingPesawatController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Artisan;
// Packages
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

require __DIR__ . '/auth.php';

Route::get('/storage', function () {
    Artisan::call('storage:link');
});

//UI Pages Routs
Route::get('/', [HomeController::class, 'uisheet'])->name('uisheet');
Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');



Route::prefix('pusat-data')->group(function () {
    Route::resource('data-pengguna', DataPenggunaController::class);
    Route::resource('data-opsi', DataOpsiController::class);
    Route::resource('jenis-opsi', JenisOpsiController::class);
    Route::resource('data-agen', DataAgenController::class);
    Route::resource('data-cabang', DataCabangController::class);
    Route::resource('data-perlengkapan-umroh', DataPerlengkapanUmrohController::class);
    Route::get('/get-cabang-id/{id}', [DataPerlengkapanUmrohController::class, 'get_cabang_by_id'])->name('get-cabang-by-id');
});

Route::prefix('inventory')->group(function () {
    Route::get('/stok-cabang', [DataPerlengkapanUmrohController::class, 'stok_cabang'])->name('stok-cabang');
    Route::get('/stok-pusat', [DataPerlengkapanUmrohController::class, 'stok_pusat'])->name('stok-pusat');

    Route::get('/tambah-pusat', [DataPerlengkapanUmrohController::class, 'create_pusat'])->name('tambah-pusat');
    Route::post('/tambah-pusat', [DataPerlengkapanUmrohController::class, 'store_pusat'])->name('tambah-pusat');

    Route::get('/tambah-cabang', [DataPerlengkapanUmrohController::class, 'create_cabang'])->name('tambah-cabang');
    Route::post('/tambah-cabang', [DataPerlengkapanUmrohController::class, 'store_cabang'])->name('tambah-cabang');

    Route::get('/update-cabang/cabang/{id_cabang}/perlengkapan/{id_perlengkapan}', [DataPerlengkapanUmrohController::class, 'show_cabang'])->name('update-cabang');
    Route::put('/update-cabang/cabang/{id_cabang}/perlengkapan/{id_perlengkapan}', [DataPerlengkapanUmrohController::class, 'update_cabang'])->name('update-cabang');

    Route::get('/update-pusat/{id}', [DataPerlengkapanUmrohController::class, 'show_pusat'])->name('update-pusat');
    Route::put('/update-pusat/{id}', [DataPerlengkapanUmrohController::class, 'update_pusat'])->name('update-pusat');

    Route::delete('/delete-cabang/cabang/{id_cabang}/perlengkapan/{id_perlengkapan}', [DataPerlengkapanUmrohController::class, 'destroy_cabang'])->name('delete-cabang');
    Route::delete('/delete-pusat/{id}', [DataPerlengkapanUmrohController::class, 'destroy_pusat'])->name('delete-pusat');
});

Route::prefix('setting-haji')->group(function () {
    Route::resource('biaya-registrasi', BiayaRegistrasiHajiController::class);
    Route::resource('kelengkapan-registrasi-haji', KelengkapanRegistrasiHajiController::class);
    Route::resource('rekening-bank', RekeningBankController::class);
    Route::resource('bank-penerima-setoran', BankPenerimaSetoranController::class);
});

Route::prefix('setting-umroh')->group(function () {
    Route::resource('paket-umroh', PaketUmrohController::class);
    Route::resource('jadwal-keberangkatan', JadwalKeberangkatanController::class);
    Route::resource('kelengkapan-registrasi-umroh', KelengkapanRegistrasiUmrohController::class);
    Route::resource('merchandise-umroh', MerchandiseUmrohController::class);
    Route::resource('setting-hotel', SettingHotelController::class);
    Route::resource('setting-pesawat', SettingPesawatController::class);
});


// Route::resource('cetak-amplop', CetakAmplopController::class);
Route::get('/cetak-amplop', [CetakAmplopController::class, 'handle_search'])->name('cetak-amplop');
Route::get('/export-pdf', [CetakAmplopController::class, 'export_pdf'])->name('export.pdf');

Route::prefix('haji')->group(function () {
    Route::resource('registrasi-haji', RegistrasiHajiController::class);
    Route::get('/detail_pay/{id}', [PembayaranHajiController::class, 'show_detail_pay'])->name('detail-pembayaran-haji');
    Route::get('/pay/{id}', [PembayaranHajiController::class, 'show_pay'])->name('pembayaran-haji');
    Route::post('/pay/{id}', [PembayaranHajiController::class, 'pay'])->name('pembayaran-haji');
    Route::resource('pembayaran-haji', PembayaranHajiController::class);
});

Route::prefix('umroh')->group(function () {
    Route::resource('registrasi-umroh', RegistrasiUmrohController::class);
    Route::get('/get-paket-id/{id}', [RegistrasiUmrohController::class, 'get_paket_by_id']);
});



Route::group(['middleware' => 'auth'], function () {
    // Permission Module
    Route::get('/role-permission', [RolePermission::class, 'index'])->name('role.permission.list');
    Route::resource('permission', PermissionController::class);
    Route::resource('role', RoleController::class);

    // Dashboard Routes

    // Users Module
    Route::resource('users', UserController::class);
});

//App Details Page => 'Dashboard'], function() {
Route::group(['prefix' => 'menu-style'], function () {
    //MenuStyle Page Routs
    Route::get('horizontal', [HomeController::class, 'horizontal'])->name('menu-style.horizontal');
    Route::get('dual-horizontal', [HomeController::class, 'dualhorizontal'])->name('menu-style.dualhorizontal');
    Route::get('dual-compact', [HomeController::class, 'dualcompact'])->name('menu-style.dualcompact');
    Route::get('boxed', [HomeController::class, 'boxed'])->name('menu-style.boxed');
    Route::get('boxed-fancy', [HomeController::class, 'boxedfancy'])->name('menu-style.boxedfancy');
});

//App Details Page => 'special-pages'], function() {
Route::group(['prefix' => 'special-pages'], function () {
    //Example Page Routs
    Route::get('billing', [HomeController::class, 'billing'])->name('special-pages.billing');
    Route::get('calender', [HomeController::class, 'calender'])->name('special-pages.calender');
    Route::get('kanban', [HomeController::class, 'kanban'])->name('special-pages.kanban');
    Route::get('pricing', [HomeController::class, 'pricing'])->name('special-pages.pricing');
    Route::get('rtl-support', [HomeController::class, 'rtlsupport'])->name('special-pages.rtlsupport');
    Route::get('timeline', [HomeController::class, 'timeline'])->name('special-pages.timeline');
});

//Widget Routs
Route::group(['prefix' => 'widget'], function () {
    Route::get('widget-basic', [HomeController::class, 'widgetbasic'])->name('widget.widgetbasic');
    Route::get('widget-chart', [HomeController::class, 'widgetchart'])->name('widget.widgetchart');
    Route::get('widget-card', [HomeController::class, 'widgetcard'])->name('widget.widgetcard');
});

//Maps Routs
Route::group(['prefix' => 'maps'], function () {
    Route::get('google', [HomeController::class, 'google'])->name('maps.google');
    Route::get('vector', [HomeController::class, 'vector'])->name('maps.vector');
});

//Auth pages Routs
Route::group(['prefix' => 'auth'], function () {
    Route::get('signin', [HomeController::class, 'signin'])->name('auth.signin');
    Route::get('signup', [HomeController::class, 'signup'])->name('auth.signup');
    Route::get('confirmmail', [HomeController::class, 'confirmmail'])->name('auth.confirmmail');
    Route::get('lockscreen', [HomeController::class, 'lockscreen'])->name('auth.lockscreen');
    Route::get('recoverpw', [HomeController::class, 'recoverpw'])->name('auth.recoverpw');
    Route::get('userprivacysetting', [HomeController::class, 'userprivacysetting'])->name('auth.userprivacysetting');
});

//Error Page Route
Route::group(['prefix' => 'errors'], function () {
    Route::get('error404', [HomeController::class, 'error404'])->name('errors.error404');
    Route::get('error500', [HomeController::class, 'error500'])->name('errors.error500');
    Route::get('maintenance', [HomeController::class, 'maintenance'])->name('errors.maintenance');
});


//Forms Pages Routs
Route::group(['prefix' => 'forms'], function () {
    Route::get('element', [HomeController::class, 'element'])->name('forms.element');
    Route::get('wizard', [HomeController::class, 'wizard'])->name('forms.wizard');
    Route::get('validation', [HomeController::class, 'validation'])->name('forms.validation');
});


//Table Page Routs
Route::group(['prefix' => 'table'], function () {
    Route::get('bootstraptable', [HomeController::class, 'bootstraptable'])->name('table.bootstraptable');
    Route::get('datatable', [HomeController::class, 'datatable'])->name('table.datatable');
});

//Icons Page Routs
Route::group(['prefix' => 'icons'], function () {
    Route::get('solid', [HomeController::class, 'solid'])->name('icons.solid');
    Route::get('outline', [HomeController::class, 'outline'])->name('icons.outline');
    Route::get('dualtone', [HomeController::class, 'dualtone'])->name('icons.dualtone');
    Route::get('colored', [HomeController::class, 'colored'])->name('icons.colored');
});
//Extra Page Routs
Route::get('privacy-policy', [HomeController::class, 'privacypolicy'])->name('pages.privacy-policy');
Route::get('terms-of-use', [HomeController::class, 'termsofuse'])->name('pages.term-of-use');
