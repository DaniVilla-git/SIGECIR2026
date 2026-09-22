<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DocumentosController;
use App\Http\Controllers\NotificacionesController;
use App\Http\Controllers\UsuariosController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])
        ->name('dashboard.index');

Route::resource('usuarios', UsuariosController::class);
Route::resource('notificaciones', NotificacionesController::class);
Route::resource('documentos', DocumentosController::class);



