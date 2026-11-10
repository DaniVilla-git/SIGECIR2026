<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfesionalRequest;
use App\Models\profesionales;
use App\Services\ProfesionalService;
use Illuminate\Http\Request;

class ProfesionalesController extends Controller
{
    private ProfesionalService $profesionalservice;

    public function __construct(ProfesionalService $profesionalservice)
    {
        $this->profesionalservice = $profesionalservice;
    }

    public function index()
    {
        $profesionales = $this->profesionalservice->listartodo();
        return view('Profesionales.index', compact('profesionales'));
    }


    public function create()
    {
        $profesionales = $this->profesionalservice->listartodo();
        return view('Profesionales.create', compact('profesionales'));
    }


    public function store(ProfesionalRequest $request)
    {
        $datos = $request->all();

        if ($request->hasFile('firma')) {

            $nombreFirma = time() . '_' . $request->file('firma')->getClientOriginalName();

            $request->file('firma')->move(
                public_path('firmas'),
                $nombreFirma
            );

            $datos['firma'] = 'firmas/' . $nombreFirma;
        }

        $this->profesionalservice->guardar($datos);

        return redirect()->route('profesionales.index');
    }


    public function show()
    {
        //
    }


    public function edit(int $id)
    {
        $profesionales = $this->profesionalservice->edit($id);
        return view('Profesionales.update', compact('profesionales'));
    }


    public function update($id, Request $request)
    {
        $profesionales = $this->profesionalservice->actualizar($id, $request->all());
        return redirect()->route('profesionales.index')->with('se creo el producto');
    }


    public function destroy(int $id)
    {
        $this->profesionalservice->eliminar($id);
        return redirect()->route('profesionales.index');
    }
}
