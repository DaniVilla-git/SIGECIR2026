<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\notificaciones;
use Illuminate\Database\Eloquent\Relations\HasOne;

class usuarios extends Model
{
    protected $table = "usuarios";

    protected $fillable = [
        'documento_identidad',
        'primer_nombre',
        'segundo_nombre',
        'primer_apellido',
        'segundo_apellido',
        'telefono_usuario',
        'correo_usuario',
        'eps_usuario',
        'regimen_usuario',
        'fecha_registro',
        'usuario_registro'
    ];

    public function notificaciones()
    {
        return $this->hasMany(notificaciones::class, 'id_usuario', 'id');
    }

    public function cuenta(): HasOne
    {
        return $this->hasOne(User::class, 'id_usuario', 'id');
    }
}