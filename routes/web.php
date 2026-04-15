<?php

use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\DepartemenController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route CRUD Karyawan
Route::get('/karyawan', [KaryawanController::class, 'index'])->name('karyawan');
Route::post('/karyawan', [KaryawanController::class, 'store'])->name('karyawan.create');
Route::get('/karyawan/tambah', [KaryawanController::class, 'show'])->name('karyawan.tambah');
Route::put('/karyawan/{id}', [KaryawanController::class, 'update'])->name('karyawan.update');
Route::get('/karyawan/{id}', [KaryawanController::class, 'edit'])->name('karyawan.edit');
Route::delete('/karyawan/{id}', [KaryawanController::class, 'destroy'])->name('karyawan.delete');

// Route CRUD Departemen
Route::get('/departemen', [DepartemenController::class, 'index'])->name('departemen');
Route::post('/departemen', [DepartemenController::class, 'store'])->name('departemen.create');
Route::get('/departemen/tambah', [DepartemenController::class, 'show'])->name('departemen.tambah');
Route::put('/departemen/{id}', [DepartemenController::class, 'update'])->name('departemen.update');
Route::get('/departemen/{id}', [DepartemenController::class, 'edit'])->name('departemen.edit');
Route::delete('/departemen/{id}', [DepartemenController::class, 'destroy'])->name('departemen.delete');
