<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CitasController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DocumentosController;
use App\Http\Controllers\NotificacionesController;
use App\Http\Controllers\ServiciosController;
use App\Http\Controllers\MensajesController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\ProfesionalesController;
use App\Http\Controllers\HorariosProfesionalController;
use App\Http\Controllers\Paciente\PortalPacienteController;

// Enlaces de confirmación de citas desde el correo
// Se conservan fuera de la autenticación del portal.

// MOSTRAR VISTA DE CONFIRMACIÓN
Route::get('/citas/{id}/confirmar-correo', [CitasController::class, 'mostrarConfirmacion'])
    ->middleware('signed')
    ->name('citas.confirmar.correo');

// PROCESAR CONFIRMACIÓN O CANCELACIÓN
Route::post('/citas/{id}/confirmar-correo', [CitasController::class, 'confirmarDesdeCorreo'])
    ->middleware('signed')
    ->name('citas.confirmar.procesar');


Route::middleware('web')->group(function () {

    // PORTAL DEL PACIENTE
    Route::middleware('auth')
        ->prefix('paciente')
        ->name('paciente.')
        ->group(function () {

            Route::get('/', [PortalPacienteController::class, 'index'])
                ->name('inicio');

            Route::get('/mis-citas', [PortalPacienteController::class, 'misCitas'])
                ->name('mis-citas');

            Route::get('/solicitar-cita', [PortalPacienteController::class, 'crearCita'])
                ->name('crear-cita');

            Route::post('/solicitar-cita', [PortalPacienteController::class, 'guardarCita'])
                ->name('guardar-cita');
            // CONSULTAR PROFESIONAL SEGÚN EL SERVICIO
            Route::get('/servicio/{id}/profesional', [ServiciosController::class, 'obtenerProfesional'])
                ->name('servicio.profesional');

            // CONSULTAR DISPONIBILIDAD
            Route::get('/disponibilidad-citas', [CitasController::class, 'disponibilidad'])
                ->name('citas.disponibilidad');
        });


    // MÓDULOS ADMINISTRATIVOS
    Route::middleware(['auth', 'can:' . config('seguridad.permiso_admin')])
        ->group(function () {

            Route::get('/dashboard', [DashboardController::class, 'index'])
                ->name('dashboard.index');

            Route::resource('usuarios', UsuariosController::class);
            Route::resource('documentos', DocumentosController::class);
            Route::get('/documentos/{id}/ver', [DocumentosController::class, 'ver'])
                ->name('documentos.ver');
            Route::resource('notificaciones', NotificacionesController::class);
            Route::resource('profesionales', ProfesionalesController::class);
            Route::resource('horario_profesional', HorariosProfesionalController::class);
            Route::resource('servicios', ServiciosController::class);
            Route::get('/servicios/{id}/profesional', [ServiciosController::class, 'obtenerProfesional'])
                ->name('servicios.profesional');
            Route::get('citas/disponibilidad', [CitasController::class, 'disponibilidad'])
                ->name('citas.disponibilidad');

            Route::resource('citas', CitasController::class);
            Route::resource('mensajes', MensajesController::class);

            Route::get('/admin', function () {
                return view('Admin.index');
            })->name('admin.index');

        });

});
