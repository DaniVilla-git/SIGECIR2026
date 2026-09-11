<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class notificaciones extends Model
{
     protected $table = "usuarios";
    
    protected $fillable = ['titulo_notificacion','mensaje_notificacion','tipo_notificacion','fecha_notificacion','id_usuario'];
}
