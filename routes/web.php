<?php

use App\Http\Controllers\DataController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PengaduanController;
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

// Free Access 
    // Landing Page
    Route::get('/', function () {
        return view('welcome');
    }); 

    require __DIR__.'/auth.php';
// Secure Access
Route::get('all-pengaduan', [PengaduanController::class, 'index']);

Route::get('main', function() {
    return view('dashboard');
})->name('dashboard')->middleware('auth');

Route::middleware('auth')->group(function() {
        // Admin & Petugas
        Route::middleware('CheckRole:admin,petugas,pengaju')->group(function() {
            // Pengaduan
            Route::get('pengaduan/{id}', [PengaduanController::class, 'show']);

             // Profile Diri
             Route::get('profile-diri', [ProfileController::class, 'viewProfile']); //profile
             Route::put('ubah-photo', [ProfileController::class, 'changeFotoProfile'])->name('ubah-photo');
             Route::put('ubah-data-profile', [ProfileController::class, 'changeDataProfile'])->name('ubah-data');

        });

        // Petugas
        Route::middleware('CheckRole:petugas')->group(function() {
            Route::get('pengaduan/{id}', [PengaduanController::class, 'show']);
            Route::get('pengaduan/tanggapan/{id}', [PengaduanController::class, 'menanggapi']); //tanggapan            
            Route::get('data-masyarakat', [DataController::class, 'DataMasyarakat']);
            Route::get('generate/online_pdf', [PengaduanController::class, 'onlinePdf']);
            Route::get('generate/download_pdf', [PengaduanController::class, 'downloadPdf']);
            Route::get('petugas/edit/{id}', [DataController::class, 'EditDataMasyarakat']);
            Route::get('petugas/update/{id}', [DataController::class, 'UpdateDataMasyarakat']);

            Route::get('profile-diri', [ProfileController::class, 'viewProfile']); //profile
            Route::put('ubah-photo', [ProfileController::class, 'changeFotoProfile'])->name('ubah-photo');
            Route::put('ubah-data-profile', [ProfileController::class, 'changeDataProfile'])->name('ubah-data');
        });
            

        // Masyarakat
        Route::middleware('CheckRole:pengaju')->group(function() {
            Route::get('ajukan-pengaduan', [PengaduanController::class, 'create']);
            Route::post('all-pengaduan', [PengaduanController::class , 'store'])->name('post.pengaju');
        });


        // Admin
        Route::middleware('CheckRole:admin')->group(function() {
            Route::get('data-semua-user', [DataController::class, 'DataAdmin']);
            // For Update User In Admin 
            Route::get('admin/edit/{id}', [DataController::class, 'EditDataAdmin']);
            Route::get('admin/update/{id}', [DataController::class , 'UpdateDataAdmin']);
            Route::get('admin/destroy/{id}', [DataController::class,'DeleteDataAdmin']);

            // For Create Petugas
            Route::get('petugas/create', [DataController::class, 'tambahDataPetugas']);
            Route::get('petugas/store', [DataController::class, 'storeDataPetugas']);

            Route::get('profile-diri', [ProfileController::class, 'viewProfile']); //profile
            Route::put('ubah-photo', [ProfileController::class, 'changeFotoProfile'])->name('ubah-photo');
            Route::put('ubah-data-profile', [ProfileController::class, 'changeDataProfile'])->name('ubah-data');

        });


});
