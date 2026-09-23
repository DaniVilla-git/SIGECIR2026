<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

class horarios_profesional extends Model
{
<<<<<<< HEAD
    protected $table = 'horarios_profesionales';
=======
    protected $table = 'horarios_profesionals';
>>>>>>> Dev2-A

    protected $fillable = ['dia_semana','hora_inicio','hora_fin','id_profesional'];

    public function profesionales(){
        return $this->belongsTo(profesionales::class, 'id_profesional');
    }
}

