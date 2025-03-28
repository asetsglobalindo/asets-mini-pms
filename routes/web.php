<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/bisnis-status', function () {
    return view('manajemen-bisnis.bisnis-status.index');
});

Route::get('/document', function () {
    return view('manajemen-bisnis.document.index');
});

Route::get('/invoice', function () {
    return view('manajemen-bisnis.invoice.index');
});

Route::get('/item', function () {
    return view('manajemen-bisnis.item.index');
});

Route::get('/kategori-bisnis', function () {
    return view('manajemen-bisnis.kategori-bisnis.index');
});

Route::get('/tenant', function () {
    return view('manajemen-bisnis.tenant.index');
});
// MANAJEMEN BISNIS END

// LAPORAN START
Route::get('/pendapatan-listing', function () {
    return view('laporan.pendapatan-listing.index');
});

Route::get('/pendapatan-total', function () {
    return view('laporan.pendapatan-total.index');
});
// LAPORAN END

// LAPORAN START
Route::get('/account', function () {
    return view('setting.account.index');
});

Route::get('/role', function () {
    return view('setting.role.index');
});

Route::get('/permission', function () {
    return view('setting.permission.index');
});
// LAPORAN END