<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Setting\AccountController;
use App\Http\Controllers\Setting\PermissionController;
use App\Http\Controllers\Setting\RoleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ManajemenBisnis\KategoriBisnisController;
use App\Http\Controllers\ManajemenBisnis\BisnisStatusController;
use App\Http\Controllers\ManajemenBisnis\ItemController;
use App\Http\Controllers\ManajemenBisnis\TenantController;


Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'loginAttempt']);
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/', function () {
        return view('index');
    });

    // INVENTROY START
    Route::get('/listing', function () {
        return view('inventory.listing.index');
    });

    Route::get('/fasilitas-listing', function () {
        return view('inventory.fasilitas-listing.index');
    });

    Route::get('/fasilitas-umum', function () {
        return view('inventory.fasilitas-umum.index');
    });

    Route::get('/jenis-ruangan', function () {
        return view('inventory.jenis-ruangan.index');
    });
    // INVENTROY END

    // MANAJEMEN BISNIS START
    Route::get('/bisnis', function () {
        return view('manajemen-bisnis.bisnis.index');
    });

    Route::get('/bisnis-status', [BisnisStatusController::class, 'index'])->name('bisnis-status.index');
    Route::post('/bisnis-status', [BisnisStatusController::class, 'store'])->name('bisnis-status.store');
    Route::put('/bisnis-status/{bisnis_status}', [BisnisStatusController::class, 'update'])->name('bisnis-status.update');
    Route::delete('/bisnis-status/{bisnis_status}', [BisnisStatusController::class, 'destroy'])->name('bisnis-status.delete');

    Route::get('/document', function () {
        return view('manajemen-bisnis.document.index');
    });

    Route::get('/invoice', function () {
        return view('manajemen-bisnis.invoice.index');
    });

    Route::get('/item', [ItemController::class, 'index'])->name('item.index');
    Route::post('/item', [ItemController::class, 'store'])->name('item.store');
    Route::put('/item/{item}', [ItemController::class, 'update'])->name('item.update');
    Route::delete('/item/{item}', [ItemController::class, 'destroy'])->name('item.delete');

    Route::get('/kategori-bisnis', [KategoriBisnisController::class, 'index'])->name('kategori-bisnis.index');
    Route::post('/kategori-bisnis', [KategoriBisnisController::class, 'store'])->name('kategori-bisnis.store');
    Route::put('/kategori-bisnis/{kategori_bisnis}', [KategoriBisnisController::class, 'update'])->name('kategori-bisnis.update');
    Route::delete('/kategori-bisnis/{kategori_bisnis}', [KategoriBisnisController::class, 'destroy'])->name('kategori-bisnis.delete');


    Route::get('/tenant', [TenantController::class, 'index'])->name('tenant.index');
    Route::post('/tenant', [TenantController::class, 'store'])->name('tenant.store');
    Route::put('/tenant/{tenant}', [TenantController::class, 'update'])->name('tenant.update');
    Route::delete('/tenant/{tenant}', [TenantController::class, 'destroy'])->name('tenant.delete');

    // LAPORAN START
    Route::get('/pendapatan-listing', function () {
        return view('laporan.pendapatan-listing.index');
    });

    Route::get('/pendapatan-total', function () {
        return view('laporan.pendapatan-total.index');
    });
    // LAPORAN END

    // SETTING START
    Route::prefix('/account')->name('account.')->group(function ($q) {
        Route::get('/', [AccountController::class, 'index'])->name('index');
        Route::post('/', [AccountController::class, 'store'])->name('store');
        Route::put('/{user}', [AccountController::class, 'update'])->name('update');
        Route::delete('/{user}', [AccountController::class, 'destroy'])->name('delete');
    });

    Route::prefix('/role')->name('role.')->group(function ($q) {
        Route::get('/', [RoleController::class, 'index'])->name('index');
        Route::post('/', [RoleController::class, 'store'])->name('store');
        Route::put('/{role}', [RoleController::class, 'update'])->name('update');
        Route::delete('/{role}', [RoleController::class, 'destroy'])->name('delete');
    });

    Route::prefix('/permission')->name('permission.')->group(function ($q) {
        Route::get('/', [PermissionController::class, 'index'])->name('index');
        Route::post('/', [PermissionController::class, 'store'])->name('store');
        Route::put('/{permission}', [PermissionController::class, 'update'])->name('update');
        Route::delete('/{permission}', [PermissionController::class, 'destroy'])->name('delete');
    });
    // SETTING END
});
