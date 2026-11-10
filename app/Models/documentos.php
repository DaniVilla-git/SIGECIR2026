<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class documentos extends Model
{
    protected $table = "documentos";

    protected $fillable = [
        'nombre_documento',
        'tipo_documento',
        'ruta_documento',
        'fecha_documento',
        'estado_documento',
        'observacion_documento',
        'id_usuario',
        'id_cita'
    ];

    // RELACIÓN CON EL USUARIO
    public function usuario()
    {
        return $this->belongsTo(usuarios::class, 'id_usuario');
    }

    // RELACIÓN CON LA CITA
    public function cita()
    {
        return $this->belongsTo(citas::class, 'id_cita');
    }
}
