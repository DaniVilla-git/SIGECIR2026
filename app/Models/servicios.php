<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\profesionales;

class servicios extends Model
{
    protected $table = "servicios";
    
    protected $fillable = ['codigo_servicio','nombre_servicio','grupo_servicio','id_profesional'];

    public function profesionales()
    {
        return $this->belongsTo(profesionales::class, 'id_profesional');
    }
}
