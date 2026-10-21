<?php

    namespace App\Repositories;
    use App\Models\profesionales;

    class ProfesionalRepository{

    public function listartodo()
    {
        return profesionales::all();
    }  

    public function guardar(array $datos)
    {
        profesionales::create($datos);
    }

    public function eliminar(int $id)
    {
        profesionales::destroy($id);
    }
 
    public function edit(int $id)
    {
        return profesionales::findOrFail($id);
    }

    public function actualizar(int $id, array $datos)
    {
        $profesional = profesionales::findOrFail($id);
        $profesional->update($datos);
    }
 









    
    }