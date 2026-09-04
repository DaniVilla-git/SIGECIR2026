<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class servicios extends Model
{
    protected $table = "usuarios";
    
    protected $fillable = ['codigo_servicio','nombre_servicio','grupo_servicio','nombre_profesional'];

    public function profesionales()
{
    return $this->belongsTo(profesionales::class, 'id_profesional');
}
}
