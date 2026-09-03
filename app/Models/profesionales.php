<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class profesionales extends Model
{
    protected $table = 'profesionales';

    protected $fillable = ['nombre_profesional','apellido_profesional','especialidad','consultorio','correo','firma'];

    public function horario_profesional(){
        return $this->hasMany(horarios_profesional::class, 'id_profesional');
    }
}
