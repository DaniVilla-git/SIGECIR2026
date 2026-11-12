<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiciosRequest;
use App\Services\ProfesionalService;
use App\Services\ServiciosService;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class ServiciosController extends Controller
{

    private ServiciosService $ServiciosService;
    private ProfesionalService $profesionalService;

    public function __construct(ServiciosService $ServiciosService, ProfesionalService $profesionalService)
    {
        $this->ServiciosService = $ServiciosService;
        $this->profesionalService = $profesionalService;
    }

    public function index()
    {
        $servicios = $this->ServiciosService->listartodo();
        return view('Servicios.index', compact('servicios'));
        
    }
    
    public function create()
    {
        $profesionales = $this->profesionalService->listartodo();
        return view('Servicios.create', compact('profesionales'));
    }

    public function store(ServiciosRequest $request)
    {
        $this->ServiciosService->guardar($request->validated());
        return redirect()->route('servicios.index');
    }

    public function show()
    {
        //
    }

    public function edit(int $id)
    {
        $servicios = $this->ServiciosService->edit($id);
        $profesionales = $this->profesionalService->listartodo();
        return view('Servicios.update', compact('servicios', 'profesionales'));
    }

    public function update(int $id, ServiciosRequest $request)
    {
        $this->ServiciosService->actualizar($id, $request->all());
        return redirect()->route('servicios.index');
    }

    public function destroy(int $id)
    {
        try {

            $this->ServiciosService->eliminar($id);

            return redirect()
                ->route('servicios.index')
                ->with('success', 'Servicio eliminado correctamente.');

        } catch (QueryException $e) {

            $codigoError = $e->errorInfo[1] ?? null;

            if (in_array($codigoError, [1451, 1217])) {

                return redirect()
                    ->route('servicios.index')
                    ->with('error', 'No se puede eliminar este servicio porque tiene citas u otra información relacionada en el sistema.');
            }

            throw $e;
        }
    }

    public function obtenerProfesional($id)
    {
        $servicio = \App\Models\servicios::with('profesionales')
            ->findOrFail($id);

        return response()->json([
            'id_profesional' => $servicio->profesionales?->id,

            'profesional' => $servicio->profesionales
                ? $servicio->profesionales->nombre_profesional . ' ' .
                $servicio->profesionales->apellido_profesional
                : '',

            'consultorio' => $servicio->profesionales?->consultorio ?? ''
        ]);
    }
}
