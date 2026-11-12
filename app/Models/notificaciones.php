<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class notificaciones extends Model
{
    protected $table = "notificaciones";

    protected $primaryKey = "id";

    protected $fillable = [
        'titulo_notificacion',
        'mensaje_notificacion',
        'tipo_notificacion',
        'fecha_notificacion',
        'id_usuario'
    ];

    public function usuario()
    {
        return $this->belongsTo(
            usuarios::class,
            'id_usuario',
            'id'
        );
    }

    // Relación con profesionales
    public function profesionales()
    {
        return $this->belongsToMany(
            profesionales::class,
            'notificacion_profesional',
            'id_notificacion',
            'id_profesional'
        )
        ->withPivot('leida', 'fecha_lectura')
        ->withTimestamps();
    }
}
