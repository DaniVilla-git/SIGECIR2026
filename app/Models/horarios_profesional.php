<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

class horarios_profesional extends Model
{
    protected $table = 'horarios_profesionals';

    protected $fillable = ['dia_semana','hora_inicio','hora_fin','id_profesional'];

    public function profesionales(){
        return $this->belongsTo(profesionales::class, 'id_profesional');
    }
}

