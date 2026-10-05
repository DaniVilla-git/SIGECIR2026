<?php

namespace App\Http\Controllers;

use App\Models\citas;
use App\Models\usuarios;
use App\Models\profesionales;
use App\Models\servicios;
use Illuminate\Http\Request;

class CitasController extends Controller
{
    public function index()
    {
        $citas = citas::with([
            'usuario',
            'profesional',
            'servicio'
        ])->get();

        return view('citas.index', compact('citas'));
    }

    public function create()
    {
        $usuarios = usuarios::all();
        $profesionales = profesionales::all();
        $servicios = servicios::all();

        return view('citas.create', compact(
            'usuarios',
            'profesionales',
            'servicios'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'modalidad_cita' => 'required|string|max:255',
            'consultorio' => 'required|string|max:255',
            'fecha_cita' => 'required|date',
            'hora_inicio' => 'required',
            'hora_fin' => 'required',
            'estado_cita' => 'required|string|max:255',
            'observaciones_cita' => 'nullable|string',
            'fecha_creacion_cita' => 'required|date',
            'id_usuario' => 'required|exists:usuarios,id',
            'id_profesional' => 'required|exists:profesionales,id',
            'id_servicios' => 'required|exists:servicios,id',
        ]);

        citas::create($request->all());

        return redirect()
            ->route('citas.index')
            ->with('success', 'Cita creada correctamente.');
    }

    public function show(citas $citas)
    {
        $citas->load([
            'usuario',
            'profesional',
            'servicio'
        ]);

        return view('citas.show', compact('citas'));
    }

    public function edit(citas $citas)
    {
        $usuarios = usuarios::all();
        $profesionales = profesionales::all();
        $servicios = servicios::all();

        return view('citas.edit', compact(
            'citas',
            'usuarios',
            'profesionales',
            'servicios'
        ));
    }

    public function update(Request $request, citas $citas)
    {
        $request->validate([
            'modalidad_cita' => 'required|string|max:255',
            'consultorio' => 'required|string|max:255',
            'fecha_cita' => 'required|date',
            'hora_inicio' => 'required',
            'hora_fin' => 'required',
            'estado_cita' => 'required|string|max:255',
            'observaciones_cita' => 'nullable|string',
            'fecha_creacion_cita' => 'required|date',
            'id_usuario' => 'required|exists:usuarios,id',
            'id_profesional' => 'required|exists:profesionales,id',
            'id_servicios' => 'required|exists:servicios,id',
        ]);

        $citas->update($request->all());

        return redirect()
            ->route('citas.index')
            ->with('success', 'Cita actualizada correctamente.');
    }

    public function destroy(citas $citas)
    {
        $citas->delete();

        return redirect()
            ->route('citas.index')
            ->with('success', 'Cita eliminada correctamente.');
    }
}