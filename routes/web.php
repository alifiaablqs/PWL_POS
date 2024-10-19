<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

// Route untuk registrasi
Route::get('registrasi', [RegistrasiController::class, 'registrasi'])->name('registrasi');
Route::post('registrasi', [RegistrasiController::class, 'store']);

// Route untuk login
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'postlogin']);
Route::get('logout', [AuthController::class, 'logout'])->middleware('auth');

// Route untuk tampilan utama
Route::get('/', [MainController::class, 'index'])->name('home'); // Halaman utama

Route::middleware(['auth'])->group(function() {
    Route::get('/dashboard', [WelcomeController::class, 'index']); // Halaman dashboard setelah login

    Route::group(['prefix' =>'profile','middleware'=>'authorize:ADM,MNG,STF,CUS'],function(){
        Route::get('/', [ProfileController::class, 'index'])->name('profile.index');
        Route::patch('/{id}', [ProfileController::class, 'update'])->name('profile.update');
    
    });


    Route::group(['prefix' => 'user'], function () {
        Route::get('/', [UserController::class, 'index']);
        Route::post('/list', [UserController::class, 'list']);
        Route::get('/create', [UserController::class, 'create']);
        Route::post('/', [UserController::class, 'store']);
        Route::get('/create_ajax', [UserController::class, 'create_ajax']);
        Route::post('/ajax', [UserController::class, 'store_ajax']);
        Route::get('/{id}', [UserController::class, 'show']);
        Route::get('/{id}/show_ajax', [UserController::class, 'show_ajax']);  
        Route::get('/{id}/edit', [UserController::class, 'edit']);
        Route::put('/{id}', [UserController::class, 'update']);
        Route::get('/{id}/edit_ajax', [UserController::class, 'edit_ajax']);
        Route::put('/{id}/update_ajax', [UserController::class, 'update_ajax']);
        Route::get('/{id}/delete_ajax', [UserController::class, 'confirm_ajax']);
        Route::delete('/{id}/delete_ajax', [UserController::class, 'delete_ajax']);
        Route::delete('/{id}', [UserController::class, 'destroy']);

        Route::get('/export_pdf', [UserController::class, 'export_pdf']);
    });
    
 //route level
 Route::group(['prefix' =>'level', 'middleware' => 'authorize:ADM'],function(){
    Route::get('/', [LevelController::class, 'index']);          // menampilkan halaman awal level
    Route::post('/list', [LevelController::class, 'list']);      // menampilkan data level dalam json untuk datables
    Route::get('/create', [LevelController::class, 'create']);   // menampilkan halaman form tambah level
    Route::post('/', [LevelController::class,'store']);          // menyimpan data level baru
    Route::get('/create_ajax', [LevelController::class, 'create_ajax']); // Menampilkan halaman form tambah level Ajax
    Route::post('/ajax', [LevelController::class, 'store_ajax']); // Menampilkan data level baru Ajax
    Route::get('/{id}', [LevelController::class, 'show']);       // menampilkan detail level
    Route::get('/{id}/show_ajax', [LevelController::class, 'show_ajax']); 
    Route::get('/{id}/edit', [LevelController::class, 'edit']);  // menampilkan halaman form edit level
    Route::put('/{id}', [LevelController::class, 'update']);     // menyimpan perubahan data level
    Route::get('/{id}/edit_ajax', [LevelController::class, 'edit_ajax']); // Menampilkan halaman form edit level Ajax
    Route::put('/{id}/update_ajax', [LevelController::class, 'update_ajax']); // Menyimpan perubahan data level Ajax
    Route::get('/{id}/delete_ajax', [LevelController::class, 'confirm_ajax']); // Untuk tampilkan form confirm delete level Ajax
    Route::delete('/{id}/delete_ajax', [LevelController::class, 'delete_ajax']); // Untuk hapus data level Ajax
    Route::delete('/{id}', [LevelController::class, 'destroy']); // menghapus data level
    Route::get('/import', [LevelController::class, 'import']); // ajax form upload excel
    Route::post('/import_ajax', [LevelController::class, 'import_ajax']); // ajax import excel
    Route::get('/export_excel',[levelcontroller::class,'export_excel']); // ajax export excel
    Route::get('/export_pdf',[levelcontroller::class,'export_pdf']); //ajax export pdf
});

    

    Route::group(['prefix' => 'kategori'], function(){
        Route::get('/', [KategoriController::class, 'index']);
        Route::post('/list', [KategoriController::class, 'list']);
        Route::get('/create', [KategoriController::class, 'create']);
        Route::post('/', [KategoriController::class, 'store']);
        Route::get('/create_ajax', [KategoriController::class, 'create_ajax']); 
        Route::post('/ajax', [KategoriController::class, 'store_ajax']);        
        Route::get('/{id}/show_ajax', [KategoriController::class, 'show_ajax']);
        Route::get('/{id}', [KategoriController::class, 'show']);
        Route::get('/{id}/edit', [KategoriController::class, 'edit']);
        Route::put('/{id}', [KategoriController::class, 'update']);
        Route::get('/{id}/edit_ajax', [KategoriController::class, 'edit_ajax']);     
        Route::put('/{id}/update_ajax', [KategoriController::class, 'update_ajax']); 
        Route::get('/{id}/confirm_ajax', [KategoriController::class, 'confirm_ajax']);     
        Route::delete('/{id}/delete_ajax', [KategoriController::class, 'delete_ajax']);
        Route::delete('/{id}', [KategoriController::class, 'destroy']);
        Route::get('/kategori/import', [KategoriController::class, 'import']);
        Route::post('/kategori/import_ajax', [KategoriController::class, 'import_ajax']);
        Route::get('/kategori/export_excel', [KategoriController::class, 'export_excel']);
        Route::get('/export_pdf', [KategoriController::class, 'export_pdf']);
    });

    Route::group(['prefix' => 'supplier'], function () {
        Route::get('/', [SupplierController::class, 'index']);
        Route::post('/list', [SupplierController::class, 'list']);
        Route::get('/create', [SupplierController::class, 'create']);
        Route::post('/', [SupplierController::class, 'store']);
        Route::get('/create_ajax', [SupplierController::class, 'create_ajax']); // menampilkan halaman form tambah supplier Ajax
        Route::post('/ajax', [SupplierController::class, 'store_ajax']); // menyimpan data supplier baru Ajax
        Route::get('/{id}/show_ajax', [SupplierController::class, 'show_ajax']);
        Route::get('/{id}', [SupplierController::class, 'show']);
        Route::get('/{id}/edit', [SupplierController::class, 'edit']);
        Route::get('/{id}/edit_ajax', [SupplierController::class, 'edit_ajax']); // menampilkan halaman form edit supplier Ajax
        Route::put('/{id}', [SupplierController::class, 'update']); // menyimpan perubahan data supplier
        Route::put('/{id}/update_ajax', [SupplierController::class, 'update_ajax']); // menyimpan perubahan data supplier Ajax
        Route::get('/{id}/delete_ajax', [SupplierController::class, 'confirm_ajax']); // untuk tampilkan form confirm delete supplier Ajax
        Route::delete('/{id}/delete_ajax', [SupplierController::class, 'delete_ajax']); // untuk hapus data supplier Ajax 
        Route::delete('/{id}', [SupplierController::class, 'destroy']);

        Route::get('/export_pdf', [SupplierController::class, 'export_pdf']);
    });

    // Route::group(['prefix' => 'barang'], function () {
        Route::middleware(['authorize:ADM,MNG,STF,CUS'])->group(function () {
            Route::get('/barang', [BarangController::class, 'index']);
            Route::post('/barang/list', [BarangController::class, 'list']);
            Route::get('/barang/create', [BarangController::class, 'create']);
            Route::post('/barang', [BarangController::class, 'store']);
            Route::get('/barang/create_ajax', [BarangController::class, 'create_ajax']);
            Route::post('/barang/ajax', [BarangController::class, 'store_ajax']);
            Route::get('/barang/{id}/show_ajax', [BarangController::class, 'show_ajax']);
            Route::get('/barang/{id}', [BarangController::class, 'show']);
            Route::get('/barang/{id}/edit', [BarangController::class, 'edit']);
            Route::get('/barang/{id}/edit_ajax', [BarangController::class, 'edit_ajax']); // Untuk edit AJAX
            Route::put('/barang/{id}', [BarangController::class, 'update']);
            Route::put('/barang/{id}/update_ajax', [BarangController::class, 'update_ajax']);
            Route::get('/barang/{id}/delete_ajax', [BarangController::class, 'confirm_ajax']);
            Route::delete('/barang/{id}/delete_ajax', [BarangController::class, 'delete_ajax']);
            Route::delete('/barang/{id}', [BarangController::class, 'destroy']);
            Route::get('/barang/import', [BarangController::class, 'import']); // ajax form upload excel
            Route::post('/barang/import_ajax', [BarangController::class, 'import_ajax']); // ajax import excel
            Route::get('/barang/export_excel', [BarangController::class, 'export_excel']); // export excel
            Route::get('/barang/export_pdf', [BarangController::class, 'export_pdf']); // export excel
        });
    
});