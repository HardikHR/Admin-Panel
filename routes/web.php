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



Route::controller(cityController::class)->group(function () {
    Route::get('/city','index')->name('layout.city');
    Route::get('/createCity', 'create')->name('layout.create');
    Route::post('/addCity', 'store')->name('layout.addCity');
    Route::get('/city/{id}/edit', 'edit')->name('layout.cityEdit');
    Route::post('/city/{id}/update', 'update')->name('layout.cityUpdate');
    Route::get('/city/{id}/delete','destroy')->name('layout.cityDelete');
});

Route::controller(stateController::class)->group(function () {
    Route::get('/','index')->name('layout.state');
    Route::get('/state', 'index')->name('layout.state');
    Route::get('/createState', 'create')->name('layout.create');
    Route::get('/state/{id}/edit','edit')->name('layout.StateEdit');
    Route::post('/state/{id}/update', 'update')->name('layout.Stateupdate');
    Route::get('/state/{id}/delete', 'destroy')->name('layout.Statedelete');
});