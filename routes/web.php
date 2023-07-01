<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\CuentaController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\ArtistaController;
use App\Http\Controllers\AdminController;

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

Route::get('/', [HomeController::class,'home'])->name('Main.home');
Route::get('/login',[HomeController::class,'login'])->name('Main.login')->middleware('guest');
Route::get('/registrar',[HomeController::class,'registro'])->name('Main.registrar')->middleware('guest');
Route::post('/registrar',[CuentaController::class,'store'])->name('cuentas.store')->middleware('guest');

Route::get('/perfil/{cuenta}',[ArtistaController::class,'perfil'])->name('Artista.perfil');
Route::get('/perfil/{cuenta}/baneadas',[ArtistaController::class,'baneadas'])->name('Artista.baneadas');
Route::get('/fotos/subir',[ArtistaController::class,'subir'])->name('Artista.subir');
Route::get('/fotos/{imagen}',[ArtistaController::class,'modificar'])->name('Artista.modificar');
Route::put('/fotos/{imagen}',[ArtistaController::class,'update'])->name('Artista.update');
Route::delete('/fotos/{imagen}', [ArtistaController::class,'delete'])->name('Artista.delete');
Route::post('/fotos/subir',[ArtistaController::class,'store'])->name('Artista.store');

Route::get('/fotos',[PublicController::class,'index'])->name('Publico.fotos');

Route::get('/banear/{imagen}',[AdminController::class,'banear'])->name('Admin.banear');
Route::put('/banear/{imagen}',[AdminController::class,'ban'])->name('Admin.ban');
Route::put('/desbanear/{imagen}',[AdminController::class,'unban'])->name('Admin.unban');
Route::get('/usuarios',[AdminController::class,'cuentas'])->name('Admin.cuentas');
Route::get('/usuarios/modificar/{usuario}/editar',[AdminController::class,'editar'])->name('Admin.editar');
Route::put('/usuarios/modificar/{usuario}',[AdminController::class,'edit'])->name('Admin.edit');
Route::delete('/usuarios/{user}',[AdminController::class,'destroy'])->name('Admin.destroy');

Route::post('/cuenta/login',[CuentaController::class,'autenticar'])->name('cuentas.autenticar');
Route::get('/cuenta/logout',[CuentaController::class,'logout'])->name('cuentas.logout');
