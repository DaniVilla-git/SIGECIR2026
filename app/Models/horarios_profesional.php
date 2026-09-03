<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

class horarios_profesional extends Model
{
    protected $table = 'horarios_profesional';

    protected $fillable = ['dia_semana','hora_inicio','hora_fin','id_profesional'];

    public function profesional(){
        return $this->belongsTo(profesionales::class, 'id_profesional');
    }

    public function servicios()
    {
        return $this->hasMany(servicios::class);
    }
}
