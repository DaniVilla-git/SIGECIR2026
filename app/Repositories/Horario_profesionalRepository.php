<?php

    namespace App\Repositories;
    use App\Models\horarios_profesional;

    class Horario_profesionalRepository{

    public function listartodo()
    {
        return horarios_profesional::all();
    }  

    public function guardar(array $datos)
    {
        horarios_profesional::create($datos);
    }

    public function eliminar(int $id)
    {
        horarios_profesional::destroy($id);
    }
 
    public function edit(int $id)
    {
        return horarios_profesional::findOrFail($id);
    }

    public function actualizar(int $id, array $datos)
    {
        $horario_profesional = horarios_profesional::findOrFail($id);
        $horario_profesional->update($datos);
    }
 









    
    }