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
        $horario_profesional->dia_semana = $datos['dia_semana'];
        $horario_profesional->hora_inicio = $datos['hora_inicio'];
        $horario_profesional->hora_fin = $datos['hora_fin'];
        $horario_profesional->id_profesional = $datos['id_profesional'];
        $horario_profesional->save();
    }










    
    }