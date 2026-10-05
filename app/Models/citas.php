<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class citas extends Model
{
    protected $table = "citas";

    protected $fillable = ['modalidad_cita','consultorio','fecha_cita','hora_inicio','hora_fin','estado_cita','observaciones_cita','fecha_creacion_cita','id_usuario','id_profesional','id_servicios'];

    public function usuario() { return $this->belongsTo(usuarios::class, 'id_usuario'); } 

    public function profesional() { return $this->belongsTo(profesionales::class, 'id_profesional'); } 
    
    public function servicio() { return $this->belongsTo(servicios::class, 'id_servicios'); } 
}
