<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\usuarios;


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
        'id_usuario'
    ];

    public function usuario()
    {
    return $this->belongsTo(usuarios::class, 'id_usuario');
    }

    
}