<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\citas;
use App\Models\profesionales;
use App\Models\usuarios;

class mensajes extends Model
{
    protected $table = 'mensajes';

    protected $fillable = ['mensaje','tipo_emisor','fecha_mensaje','id_cita','id_profesional','id_usuario'
    ];

    public function cita()
    {
        return $this->belongsTo(citas::class, 'id_cita');
    }

    public function profesional()
    {
        return $this->belongsTo(profesionales::class, 'id_profesional');
    }

    public function usuario()
    {
        return $this->belongsTo(usuarios::class, 'id_usuario');
    }
}