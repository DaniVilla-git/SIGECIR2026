<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class profesionales extends Model
{
    protected $table = 'profesionales';

    protected $fillable = [
        'nombre_profesional',
        'apellido_profesional',
        'especialidad',
        'consultorio',
        'correo',
        'firma',
        'id_user'
    ];

    public function servicios(){
        return $this->hasMany(servicios::class);
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
