<?php

use App\Http\Controllers\cityController;
use App\Http\Controllers\stateController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [MainController::class, 'index']);
Route::get('/state', [stateController::class,'index'])->name('layout.state');
Route::get('/createState', [stateController::class,'create'])->name('layout.create');
Route::post('/addState', [stateController::class,'store'])->name('layout.addState');
Route::get('/state/{id}/edit', [stateController::class,'edit'])->name('layout.StateEdit');
Route::post('/state/{id}/update', [stateController::class,'update'])->name('layout.Stateupdate');
Route::get('/state/{id}/delete', [stateController::class,'destroy'])->name('layout.Statedelete');

Route::get('/city', [cityController::class,'index'])->name('layout.city');
Route::get('/createCity', [cityController::class,'create'])->name('layout.create');
Route::post('/addCity', [cityController::class,'store'])->name('layout.addCity');
Route::get('/city/{id}/edit', [cityController::class,'edit'])->name('layout.cityEdit');
Route::post('/city/{id}/update', [cityController::class,'update'])->name('layout.cityUpdate');
Route::get('/city/{id}/delete', [cityController::class, 'destroy'])->name('layout.cityDelete');
