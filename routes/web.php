<?php

use App\Http\Controllers\CitasController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DocumentosController;
use App\Http\Controllers\NotificacionesController;
use App\Http\Controllers\ServiciosController;
use App\Http\Controllers\ProfesionalesController;
use App\Http\Controllers\HorariosProfesionalController;
use App\Http\Controllers\UsuariosController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])
        ->name('dashboard.index');

Route::resource('usuarios', UsuariosController::class);
Route::resource('notificaciones', NotificacionesController::class);
Route::resource('documentos', DocumentosController::class);
Route::resource('profesionales', ProfesionalesController::class);
Route::resource('horario_profesional', HorariosProfesionalController::class);
Route::resource('servicios', ServiciosController::class);
Route::resource('citas', CitasController::class);


// Portal de profesionales

Route::get('/vista-login-profesional', function () {
    return view('Profesionales.login');
})->name('profesionales.login');

Route::get('/dashboard-profesional', function () {
    return view('Profesionales.dashboard');
})->name('profesionales.dashboard');

Route::get('/agenda-profesional', function () {
    return view('Profesionales.agenda');
})->name('profesionales.agenda');

Route::get('/pacientes-profesional', function () {
    return view('Profesionales.pacientes');
})->name('profesionales.pacientes');

Route::get('/notificaciones-profesional', function () {
    return view('Profesionales.notificaciones');
})->name('profesionales.notificaciones');

Route::get('/horario-profesional', function () {
    return view('Profesionales.horario');
})->name('profesionales.horario');

Route::get('/perfil-profesional', function () {
    return view('Profesionales.perfil');
})->name('profesionales.perfil');
