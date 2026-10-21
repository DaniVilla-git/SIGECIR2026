<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class profesionales extends Model
{
    protected $table = 'profesionales';

    protected $fillable = ['nombre_profesional','apellido_profesional','especialidad','consultorio','correo','firma'];

    public function servicios(){
        return $this->hasMany(servicios::class);
    }   
}
