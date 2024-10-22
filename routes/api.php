<?php

use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\AlatTulisController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/pegawai',[PegawaiController::class,'index']);
Route::middleware('auth:sanctum')->post('/pegawai',[PegawaiController::class,'store']);
Route::middleware('auth:sanctum')->patch('/pegawai/{pegawai}',[PegawaiController::class,'update']);
Route::middleware('auth:sanctum')->delete('/pegawai/{pegawai}',[PegawaiController::class,'destroy']);

Route::get('/pelanggan',[PelangganController::class,'index']);
Route::middleware('auth:sanctum')->post('/pelanggan',[PelangganController::class,'store']);
Route::middleware('auth:sanctum')->patch('/pelanggan/{pelanggan}',[PelangganController::class,'update']);
Route::middleware('auth:sanctum')->delete('/pelanggan/{pelanggan}',[PelangganController::class,'destroy']);

Route::get('/alattulis',[AlatTulisController::class,'index']);
Route::middleware('auth:sanctum')->post('/alattulis',[AlatTulisController::class,'store']);
Route::middleware('auth:sanctum')->patch('/alattulis/{alattulis}',[AlatTulisController::class,'update']);
Route::middleware('auth:sanctum')->delete('/alattulis/{alattulis}',[AlatTulisController::class,'destroy']);

Route::get('/transaksi',[TransaksiController::class,'index']);
Route::middleware('auth:sanctum')->post('/transaksi',[TransaksiController::class,'store']);
Route::middleware('auth:sanctum')->patch('/transaksi/{transaksi}',[TransaksiController::class,'update']);
Route::middleware('auth:sanctum')->delete('/transaksi/{transaksi}',[TransaksiController::class,'destroy']);

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);