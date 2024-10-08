<?php

use App\Http\Controllers\ConnectionController;
use App\Http\Controllers\ProaccountingController;
use App\Http\Controllers\ProhukumController;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\SwitchConnectionPA;
use App\Http\Middleware\SwitchConnectionPH;
use App\Http\Controllers\DocumentationProaccountingController;
use Illuminate\Support\Facades\Route;


Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'loginAuth'])->name('login.auth');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/dashboard', [LoginController::class, 'dashboard'])->name('dashboard');

Route::prefix('/documentation')->name('documentation.')->group(function () {
    Route::get('/', [DocumentationProaccountingController::class, 'index'])->name('home');
    Route::get('/create', [DocumentationProaccountingController::class, 'create'])->name('create');
    Route::post('/store', [DocumentationProaccountingController::class, 'store'])->name('store');
    Route::get('/{id}', [DocumentationProaccountingController::class, 'edit'])->name('edit');
    Route::patch('/{id}', [DocumentationProaccountingController::class, 'update'])->name('update');
    Route::delete('/{id}', [DocumentationProaccountingController::class, 'destroy'])->name('delete');
});

Route::prefix('/connection_setting')->name('connection.')->group(function () {
    Route::get('/create', [ConnectionController::class, 'create'])->name('create');
    Route::post('/store', [ConnectionController::class, 'store'])->name('store');
    Route::get('/', [ConnectionController::class, 'index'])->name('home');
    Route::get('/{id}', [ConnectionController::class, 'edit'])->name('edit');
    Route::patch('/{id}', [ConnectionController::class, 'update'])->name('update');
    Route::delete('/{id}', [ConnectionController::class, 'destroy'])->name('delete');
});

Route::prefix('/proaccounting')->name('proaccounting.')->group(function () {
    Route::get('/', [ProaccountingController::class, 'index'])->name('home');
    Route::get('/switch_connection', [ProaccountingController::class, 'switch_connection'])->name('switch_connection');

    Route::middleware([SwitchConnectionPA::class])->group(function () {
        Route::get('/detail', [ProaccountingController::class, 'detail'])->name('detail');
        Route::get('/edit', [ProaccountingController::class, 'edit'])->name('edit');
        Route::patch('/update', [ProaccountingController::class, 'update'])->name('update');
    });
});

Route::prefix('/prohukum')->name('prohukum.')->group(function () {
    Route::get('/', [ProhukumController::class, 'index'])->name('home');
    Route::get('/switch_connection', [ProhukumController::class, 'switch_connection'])->name('switch_connection');

    Route::middleware([SwitchConnectionPH::class])->group(function () {
        Route::get('/detail', [ProhukumController::class, 'detail'])->name('detail');
        Route::get('/edit', [ProhukumController::class, 'edit'])->name('edit');
        Route::patch('/update', [ProhukumController::class, 'update'])->name('update');
    });
});
