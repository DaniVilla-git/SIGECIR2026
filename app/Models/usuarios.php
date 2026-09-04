<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class usuarios extends Model
{
    protected $table = "usuarios";
    
    protected $fillable = ['primer_nombre','segundo_nombre','primer_apellido','segundo_apellido','telefono_usuario','correo_usuario','eps_usuario','regimen_usuario','fecha_registro','usuario_registro'];
    
}
