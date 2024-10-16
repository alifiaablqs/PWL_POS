<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::pattern('id', '[0-9]+'); // artinya ketika ada parameter {id}, maka harus berupa angka

Route::get('registrasi', [RegistrasiController::class, 'registrasi'])->name('registrasi');
Route::post('registrasi', [RegistrasiController::class, 'store']);

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'postlogin']);
Route::get('logout', [AuthController::class, 'logout'])->middleware('auth');

Route::middleware(['auth'])->group(function() { // Semua route di bawah ini membutuhkan autentikasi

    Route::get('/', [WelcomeController::class, 'index']);

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
    });

    // Route::group(['prefix' => 'level'], function () {
        Route::middleware(['authorize:ADM'])->group(function() {
            Route::get('/level', [LevelController::class, 'index']);          // menampilkan halaman awal level
            Route::Post('/level/list', [LevelController::class, 'list']);      // menampilkan data level
            Route::get('/level/create_ajax', [LevelController::class, 'create_ajax']); // menampilkan halaman form tambah level ajax
            Route::post('level//ajax', [LevelController::class, 'store_ajax']);        // menyimpan data level baru ajax
            Route::get('/level/{id}/show_ajax', [LevelController::class, 'show_ajax']);    // menampilkan halaman awal level ajax
            Route::get('/level/{id}/edit_ajax', [LevelController::class, 'edit_ajax']);     // menampilkan halaman form edit level ajax
            Route::put('/level/{id}/update_ajax', [LevelController::class, 'update_ajax']); // menyimpan perubahan data level ajax
            Route::get('/level/{id}/confirm_ajax', [LevelController::class, 'confirm_ajax']); // untuk tampilan form confirm delete level ajax
            Route::delete('/level/{id}/delete_ajax', [LevelController::class, 'delete_ajax']); // menghapus data level ajax
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
    });

    // Route::group(['prefix' => 'barang'], function () {
        Route::middleware(['authorize:ADM,MNG'])->group(function () {
            Route::get('/barang', [BarangController::class, 'index']);
            Route::post('/barang/list', [BarangController::class, 'list']);
            Route::get('/barang/create', [BarangController::class, 'create']);
            Route::post('/barang', [BarangController::class, 'store']);
            
            // Rute untuk AJAX
            Route::get('/barang/create_ajax', [BarangController::class, 'create_ajax']);
            Route::post('/barang/ajax', [BarangController::class, 'store_ajax']);
            Route::get('/barang/{id}/show_ajax', [BarangController::class, 'show_ajax']);  // Untuk detail AJAX
            Route::get('/barang/{id}/edit_ajax', [BarangController::class, 'edit_ajax']); // Untuk edit AJAX
            Route::put('/barang/{id}/update_ajax', [BarangController::class, 'update_ajax']); // Untuk update AJAX
            Route::get('/barang/{id}/confirm_ajax', [BarangController::class, 'confirm_ajax']); // Untuk konfirmasi hapus
            Route::delete('/barang/{id}/delete_ajax', [BarangController::class, 'delete_ajax']); // Untuk hapus AJAX
            
            Route::get('/barang/{id}', [BarangController::class, 'show']); // Detail non-AJAX
            Route::get('/barang/{id}/edit', [BarangController::class, 'edit']); // Edit non-AJAX
            Route::put('/barang/{id}', [BarangController::class, 'update']); // Update non-AJAX
            Route::delete('/barang/{id}', [BarangController::class, 'destroy']); // Hapus non-AJAX
            
            Route::get('/barang/import', [BarangController::class, 'import']); // Ajax form upload excel
            Route::post('/barang/import_ajax', [BarangController::class, 'import_ajax']); // Ajax import excel
        });
        
    
});