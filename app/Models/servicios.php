<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class servicios extends Model
{
    protected $table = "usuarios";
    
    protected $fillable = ['codigo_servicio','nombre_servicio','grupo_servicio','id_profesional'];

    public function profesional()
{
    return $this->belongsTo(profesionales::class);
}
}
