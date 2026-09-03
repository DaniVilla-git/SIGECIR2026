<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\ServiciosController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])
        ->name('dashboard.index');

Route::resource('usuarios', UsuariosController::class);
Route::resource('servicios', ServiciosController::class);
