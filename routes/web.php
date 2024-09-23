<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\DocumentPengusulController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\ProsesController;
use App\Http\Controllers\FormJabatanFungsionalController;
use App\Http\Controllers\FormJabatanStrukturalController;
use App\Http\Controllers\FormPangkatRegularController;
use App\Http\Controllers\PeriodeController;
use App\Http\Controllers\DinasController;
use App\Http\Controllers\GolonganController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\FormPangkatijazahController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\RulesController;
use App\Http\Controllers\PaController;
use Faker\Guesser\Name;
use App\Http\Controllers\FileUploadController;

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


Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/logout', [LoginController::class, 'logout']);
Route::post('/login/proses', [LoginController::class, 'authenticate'])->name('authenticate');

Route::middleware('auth')->group(function () {
    Route::group(['middleware' => 'ceklevel:superadmin'], function () {

        // dashboard
        Route::get('/dashboard-super-admin', [DashboardController::class, 'superadmin']);

        // profile
        Route::get('/profile-super-admin', [ProfileController::class, 'superadmin'])->name('profile.superadmin');
        Route::post('/profile-super-admin/store', [ProfileController::class, 'storeSuperadmin'])->name('upload.profile.superadmin');

        // registrasi
        Route::get('/register-role', [RegisterController::class, 'index'])->name('register.role');
        Route::post('/register-store', [RegisterController::class, 'register'])->name('register.store');

        // role
        Route::get('/role', [RoleController::class, 'index'])->name('role.table');
        Route::get('/role/edit/{id}', [RoleController::class, 'edit'])->name('role.edit');
        Route::put('/role/edit/update/{id}', [RoleController::class, 'update'])->name('role.update');
        Route::delete('/role/delete/{id}', [RoleController::class, 'destroy'])->name('role.delete');

        // periode
        Route::get('/periode', [PeriodeController::class, 'index']);
        Route::get('/form-periode', [PeriodeController::class, 'create']);
        Route::post('/form-periode/store', [PeriodeController::class, 'store'])->name('periode.store');
        Route::get('/form-periode/edit/{id}', [PeriodeController::class, 'edit'])->name('periode.edit');
        Route::put('/form-periode/edit/update/{id}', [PeriodeController::class, 'update'])->name('periode.update');
        Route::delete('/form-periode/delete/{id}', [PeriodeController::class, 'destroy'])->name('periode.delete');

        // jabatan
        Route::get('/golongan', [GolonganController::class, 'index']);
        Route::get('/form-golongan', [GolonganController::class, 'create']);
        Route::post('/form-golongan/store', [GolonganController::class, 'store'])->name('golongan.store');
        Route::get('/form-golongan/edit/{id}', [GolonganController::class, 'edit'])->name('golongan.edit');
        Route::put('/form-golongan/edit/update/{id}', [GolonganController::class, 'update'])->name('golongan.update');
        Route::delete('/form-golongan/delete/{id}', [GolonganController::class, 'destroy'])->name('golongan.delete');

        // kecamatan
        Route::get('/SKPD', [KecamatanController::class, 'index']);
        Route::get('/form-SKPD', [KecamatanController::class, 'create']);
        Route::post('/form-SKPD/store', [KecamatanController::class, 'store'])->name('kecamatan.store');
        Route::get('/form-SKPD/edit/{id}', [KecamatanController::class, 'edit'])->name('kecamatan.edit');
        Route::put('/form-SKPD/edit/update/{id}', [KecamatanController::class, 'update'])->name('kecamatan.update');
        Route::delete('/form-SKPD/delete/{id}', [KecamatanController::class, 'destroy'])->name('kecamatan.delete');

        // dinas
        Route::get('/dinas', [DinasController::class, 'index']);
        Route::get('/form-dinas', [DinasController::class, 'create']);
        Route::post('/form-dinas/store', [DinasController::class, 'store'])->name('dinas.store');
        Route::get('/form-dinas/edit/{id}', [DinasController::class, 'edit'])->name('dinas.edit');
        Route::put('/form-dinas/edit/update/{id}', [DinasController::class, 'update'])->name('dinas.update');
        Route::delete('/form-dinas/delete/{id}', [DinasController::class, 'destroy'])->name('dinas.delete');

        // status
        Route::get('/status', [StatusController::class, 'index']);
        Route::get('/form-status', [StatusController::class, 'create']);
        Route::post('/form-status/store', [StatusController::class, 'store'])->name('status.store');
        Route::get('/form-status/edit/{id}', [StatusController::class, 'edit'])->name('status.edit');
        Route::put('/form-status/edit/update/{id}', [StatusController::class, 'update'])->name('status.update');
        Route::delete('/form-status/delete/{id}', [StatusController::class, 'destroy'])->name('status.delete');

        // dokumen pengusul
        Route::get('/document-pengusul', [DocumentPengusulController::class, 'index']);
        Route::get('/document-pengusul/search', [DocumentPengusulController::class, 'searchadmin'])->name('document.pengusul.search');
        Route::delete('/document-pengusul/delete-fungsional/{id}', [FormJabatanFungsionalController::class, 'delete'])->name('form-jabatan-fungsional.delete');
        Route::delete('/document-pengusul/delete-struktural/{id}', [FormJabatanStrukturalController::class, 'destroy'])->name('form-jabatan-struktural.delete');
        Route::delete('/document-pengusul/delete-regular/{id}', [FormPangkatRegularController::class, 'destroy'])->name('form-jabatan-regular.delete');
        Route::delete('/document-pengusul/delete-ijazah/{id}', [FormPangkatijazahController::class, 'destroy'])->name('form-jabatan-ijazah.delete');
        Route::get('/document-pengusul-fungsional/show/{id}', [DocumentPengusulController::class, 'showfungsional'])->name('document.pengusul-fungsional.show');
        Route::get('/document-pengusul-regular/show/{id}', [DocumentPengusulController::class, 'showregular'])->name('document.pengusul-regular.show');
        Route::get('/document-pengusul-struktural/show/{id}', [DocumentPengusulController::class, 'showstruktural'])->name('document.pengusul-struktural.show');
        Route::get('/document-pengusul-ijazah/show/{id}', [DocumentPengusulController::class, 'showijazah'])->name('document.pengusul-ijazah.show');

        // halaman
        Route::get('/pages', [PagesController::class, 'index']);
        Route::post('/pages/{id}/update-status', [PagesController::class, 'updateStatus'])->name('super-admin.pages.updateStatus');
    });

    Route::group(['middleware' => 'ceklevel:pengusul'], function () {

        // dashboard
        Route::get('/dashboard-pengusul', [DashboardController::class, 'index']);

        //error page
        Route::get('/eror-pages', [PagesController::class, 'errorPage'])->name('error.page');

        // notifikasi
        Route::get('/notifikasi-pengusul', [NotificationController::class, 'index']);
        Route::get('/notifikasi-pengusul-detail/{id}', [NotificationController::class, 'detail'])->name('notif.detail');
        Route::post('/notifikasi/{id}/read', [NotificationController::class, 'markAsRead'])->name('notifications.read');
        Route::delete('/notifikasi/archive/{id}', [NotificationController::class, 'archive'])->name('notifications.archive');
        Route::post('/notifikasi/read-all', [NotificationController::class, 'markAllAsRead'])->name('notifications.readAll');

        // profile
        Route::get('/profile-pengusul', [ProfileController::class, 'pengusul'])->name('profile.pengusul');
        Route::post('/profile-pengusul/store', [ProfileController::class, 'storePengusul'])->name('upload.profile.pengusul');

        // form jabatan fungsional
        Route::get('/form-jabatan-fungsional', [FormJabatanFungsionalController::class, 'create']);
        Route::get('/table-jabatan-fungsional', [FormJabatanFungsionalController::class, 'index']);
        Route::get('/proses-table-jabatan-fungsional', [FormJabatanFungsionalController::class, 'proses']);
        Route::get('/proses-table-jabatan-fungsional/{id}', [FormJabatanFungsionalController::class, 'edit'])->name('jabatan.fungsional.edit');
        Route::put('/proses-table-jabatan-fungsional/post/{id}', [FormJabatanFungsionalController::class, 'update'])->name('jabatan.fungsional.update');
        Route::post('/form-jabatan-fungsional/post', [FormJabatanFungsionalController::class, 'store'])->name('jabatan.fungsional.post');
        Route::get('/form-jabatan-fungsional/show/{id}', [FormJabatanFungsionalController::class, 'show'])->name('jabatan.fungsional.show');
        Route::get('/table-jabatan-fungsional/search', [FormJabatanFungsionalController::class, 'search'])->name('jabatan.fungsional.search');

        // form jabatan struktural
        Route::get('/form-jabatan-struktural', [FormJabatanStrukturalController::class, 'create']);
        Route::get('/table-jabatan-struktural', [FormJabatanStrukturalController::class, 'index']);
        Route::get('/proses-table-struktural/{id}', [FormJabatanStrukturalController::class, 'edit'])->name('jabatan.struktural.edit');
        Route::put('/proses-table-struktural/post/{id}', [FormJabatanStrukturalController::class, 'update'])->name('jabatan.struktural.update');
        Route::get('/proses-table-struktural', [FormJabatanStrukturalController::class, 'proses']);
        Route::post('/form-jabatan-struktural/post', [FormJabatanStrukturalController::class, 'store'])->name('jabatan.struktural.post');
        Route::get('/form-jabatan-struktural/show/{id}', [FormJabatanStrukturalController::class, 'show'])->name('jabatan.struktural.show');
        Route::get('/table-jabatan-struktural/search', [FormJabatanStrukturalController::class, 'search'])->name('jabatan.struktural.search');


        // form jabatan regular

        Route::post('/upload', [FileUploadController::class, 'store']);
        Route::get('/form-regular', [FormPangkatRegularController::class, 'create']);
        Route::get('/table-regular', [FormPangkatRegularController::class, 'index']);
        Route::get('/proses-table-regular', [FormPangkatRegularController::class, 'proses']);
        Route::get('/proses-table-regular/{id}', [FormPangkatRegularController::class, 'edit'])->name('jabatan.regular.edit');
        Route::put('/proses-table-regular/post/{id}', [FormPangkatRegularController::class, 'update'])->name('jabatan.regular.update');
        Route::post('/form-jabatan-regular/post', [FormPangkatRegularController::class, 'store'])->name('jabatan.regular.post');
        Route::get('/form-jabatan-regular/show/{id}', [FormPangkatRegularController::class, 'show'])->name('jabatan.regular.show');
        Route::get('/table-regular/search', [FormPangkatRegularController::class, 'search'])->name('jabatan.regular.search');

        // form jabatan ijazah
        Route::get('/form-jabatan-ijazah', [FormPangkatijazahController::class, 'create']);
        Route::get('/table-jabatan-ijazah', [FormPangkatijazahController::class, 'index']);
        Route::get('/proses-table-ijazah', [FormPangkatijazahController::class, 'proses']);
        Route::get('/proses-table-ijazah/{id}', [FormPangkatijazahController::class, 'edit'])->name('jabatan.ijazah.edit');
        Route::put('/proses-table-ijazah/post/{id}', [FormPangkatijazahController::class, 'update'])->name('jabatan.ijazah.update');
        Route::post('/form-jabatan-ijazah/post', [FormPangkatijazahController::class, 'store'])->name('jabatan.ijazah.post');
        Route::get('/form-jabatan-ijazah/show/{id}', [FormPangkatijazahController::class, 'show'])->name('jabatan.ijazah.show');
        Route::get('/table-jabatan-ijazah/search', [FormPangkatijazahController::class, 'search'])->name('jabatan.ijazah.search');

       //rules
        Route::get('/rules-pengusul', [RulesController::class, 'viewrules']);

    });

    Route::group(['middleware' => 'ceklevel:verifikator'], function () {

        // dashboard
        Route::get('/dashboard-verifikator', [DashboardController::class, 'verifikator']);

        // profile
        Route::get('/profile-verifikator', [ProfileController::class, 'verifikator'])->name('profile.verifikator');
        Route::post('/profile-verifikator/store', [ProfileController::class, 'storeVerifikator'])->name('upload.profile.verifikator');

        // form jabatan fungsional
        Route::get('/table-jabatan-fungsional-verifikator', [FormJabatanFungsionalController::class, 'indexverifikator']);
        Route::get('/proses-table-jabatan-fungsional-verifikator', [FormJabatanFungsionalController::class, 'prosesverifikator']);
        Route::get('/verifikasi-table-jabatan-fungsional-verifikator/{id}', [FormJabatanFungsionalController::class, 'verifikasi'])->name('verifikasi.jabatan.fungsional.edit');
        Route::post('/verifikasi-table-jabatan-fungsional-verifikator/post/{id}', [FormJabatanFungsionalController::class, 'verifikasipost'])->name('verifikasi.jabatan.fungsional.post');
        Route::get('/form-jabatan-fungsional-verifikator/{id}', [FormJabatanFungsionalController::class, 'showverifikator'])->name('jabatan.fungsional.show.verifikator');

        // form jabatan struktural
        Route::get('/table-struktural-verifikator', [FormJabatanStrukturalController::class, 'indexverifikator']);
        Route::get('/proses-table-struktural-verifikator', [FormJabatanStrukturalController::class, 'prosesverifikator']);
        Route::get('/verifikasi-table-struktural-verifikator/{id}', [FormJabatanStrukturalController::class, 'verifikasi'])->name('verifikasi.jabatan.struktural.edit');
        Route::post('/verifikasi-table-struktural-verifikator/post/{id}', [FormJabatanStrukturalController::class, 'verifikasipost'])->name('verifikasi.jabatan.struktural.post');
        Route::get('/form-struktural-verifikator/{id}', [FormJabatanStrukturalController::class, 'showverifikator'])->name('jabatan.struktural.show.verifikator');

        // form jabatan regular
        Route::get('/table-regular-verifikator', [FormPangkatRegularController::class, 'indexverifikator']);
        Route::get('/proses-table-regular-verifikator', [FormPangkatRegularController::class, 'prosesverifikator']);
        Route::get('/verifikasi-table-regular-verifikator/{id}', [FormPangkatRegularController::class, 'verifikasi'])->name('verifikasi.jabatan.regular.edit');
        Route::post('/verifikasi-table-regular-verifikator/post/{id}', [FormPangkatRegularController::class, 'verifikasipost'])->name('verifikasi.jabatan.regular.post');
        Route::get('/form-regular-verifikator/{id}', [FormPangkatRegularController::class, 'showverifikator'])->name('jabatan.regular.show.verifikator');

        // form jabatan ijazah
        Route::get('/table-ijazah-verifikator', [FormPangkatijazahController::class, 'indexverifikator']);
        Route::get('/proses-table-ijazah-verifikator', [FormPangkatijazahController::class, 'prosesverifikator']);
        Route::get('/verifikasi-table-ijazah-verifikator/{id}', [FormPangkatijazahController::class, 'verifikasi'])->name('verifikasi.jabatan.ijazah.edit');
        Route::post('/verifikasi-table-ijazah-verifikator/post/{id}', [FormPangkatijazahController::class, 'verifikasipost'])->name('verifikasi.jabatan.ijazah.post');
        Route::get('/form-ijazah-verifikator/{id}', [FormPangkatijazahController::class, 'showverifikator'])->name('jabatan.ijazah.show.verifikator');

        // pencarian form
        Route::get('/proses/search', [SearchController::class, 'searchverifikator'])->name('form.search');

        //pa
        Route::get('/pa', [PaController::class, 'viewpa']);
    });

});
