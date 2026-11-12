<?php

namespace App\Http\Controllers;

use App\Models\usuarios;
use App\Services\UsuarioService;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    private UsuarioService $UsuarioService;

    public function __construct(UsuarioService $UsuarioService){
        $this->UsuarioService = $UsuarioService;

    }
    public function index(Request $request)
    {
        $buscar = $request->input('buscar');

        $usuarios = usuarios::when($buscar, function ($query) use ($buscar) {
            $query->where('numero_documento', 'LIKE', '%' . $buscar . '%');
        })->get();

        return view('usuarios.index', compact('usuarios'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->UsuarioService->guardar($request->all());
        return redirect()->route('usuarios.index')->with('success', 'Usuario creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(usuarios $usuarios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)

    {
        $usuarios = $this->UsuarioService->edit($id);
        return view('Usuarios.update', compact('usuarios'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, Request $request)
    
    {
        $usuarios = $this->UsuarioService->actualizar($id, $request->all());
        return redirect()->route('usuarios.index')->with('se creo el Usuario');
    }
    

    
    public function destroy(int $id)
    {
        try {

            $this->UsuarioService->eliminar($id);

            return redirect()->route('usuarios.index')
                ->with('success', 'Usuario eliminado correctamente.');

        } catch (QueryException $e) {

            return redirect()->route('usuarios.index')
                ->with('error', 'No se puede eliminar este usuario porque tiene información relacionada en el sistema.');

        }
    }
}
