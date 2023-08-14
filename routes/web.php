<?php

use Illuminate\Support\Facades\Route;
use App\Models\Barang;
use App\Models\Transaksi;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DanaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;

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

// Route::get('/', function () {
//     return view('user.index', ['title' => 'Login']);
// })->name('login')->middleware('guest');
Route::get('/',[LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login',[LoginController::class, 'login']);
Route::post('/logout',[LoginController::class, 'logout']);

Route::get('/dashboard',[DashboardController::class, 'index'])->middleware('auth');

Route::get('/barang',[BarangController::class, 'show'])->middleware('auth');
Route::get('/barang/tambah',[BarangController::class, 'create'])->middleware('auth');
Route::post('/barang/simpan',[BarangController::class, 'store']);
Route::get('/barang/{id}/edit',[BarangController::class, 'edit'])->middleware('auth');
Route::put('/barang/{id}',[BarangController::class, 'update']);
Route::get('/barang/{id}/hapus',[BarangController::class, 'remove']);


Route::get('/dana',[DanaController::class, 'index']);
Route::get('/dana/masuk',[DanaController::class,'create']);
Route::post('/dana/masuk/simpan',[DanaController::class,'store']);
Route::get('/dana/{id}/edit',[DanaController::class, 'edit']);
Route::put('/dana/{id}', [DanaController::class, 'update']);
Route::get('/pengeluaran',[DanaController::class,'showPengeluaran']);
Route::post('/pengeluaran/store',[DanaController::class,'storePengeluaran']);

Route::get('/transaksi',[TransaksiController::class, 'index']);
Route::get('/transaksi/daftar',[TransaksiController::class, 'daftarTransaksi']);


Route::get('/staff',[UserController::class,'index'])->middleware('auth','admin');

