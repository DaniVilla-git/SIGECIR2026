<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD

class servicios extends Model
{
    protected $table = "usuarios";
    
    protected $fillable = ['codigo_servicio','nombre_servicio','grupo_servicio','id_profesional'];

    public function profesional()
{
    return $this->belongsTo(profesionales::class);
}
=======
use App\Models\profesionales;

class servicios extends Model
{
    protected $table = "servicios";
    
    protected $fillable = ['codigo_servicio','nombre_servicio','grupo_servicio','id_profesional'];

    public function profesionales()
    {
        return $this->belongsTo(profesionales::class, 'id_profesional');
    }
>>>>>>> Dev2-A
}
