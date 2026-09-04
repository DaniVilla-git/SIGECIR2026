<?php

namespace App\Http\Controllers;

use App\Models\usuarios;
use App\Services\UsuarioService;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    private UsuarioService $UsuarioService;

    public function __construct(UsuarioService $UsuarioService){
        $this->UsuarioService = $UsuarioService;
   
    }
           
    public function index()
    {
        $usuarios = $this->UsuarioService->listarTodo();
        return view('Usuarios.index', compact('usuarios'));
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
        $usuario = $this->UsuarioService->edit($id);
        return view('Usuarios.update', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, Request $request)
    
    {
        $usuario = $this->UsuarioService->actualizar($id, $request->all());
        return redirect()->route('usuarios.index')->with('se creo el Usuario');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $this->UsuarioService->eliminar($id);
        return redirect()->route('usuarios.index');
    }
}
