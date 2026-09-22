<?php

namespace App\Http\Controllers;

use App\Models\documentos;
use App\Models\usuarios;
use App\Services\documentosService;
use Illuminate\Http\Request;

class DocumentosController extends Controller
{
    private documentosService $documentosService;

    public function __construct(documentosService $documentosService)
    {
        $this->documentosService = $documentosService;
    }

    public function index()
    {
        $documentos = documentos::all();

        return view('documentos.index', compact('documentos'));
    }

   public function create()
    {
    $usuarios = usuarios::all();

    return view('documentos.create', compact('usuarios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_documento' => 'required|string|max:255',
            'tipo_documento' => 'required|string|max:255',
            'ruta_documento' => 'required|file|mimes:pdf,jpg,jpeg,png|max:10240',
            'fecha_documento' => 'required|date',
            'estado_documento' => 'required|string|max:255',
            'observacion_documento' => 'nullable|string',
            'id_usuario' => 'required|exists:usuarios,id',
        ]);

        $documento = new documentos();

        $documento->nombre_documento = $request->nombre_documento;
        $documento->tipo_documento = $request->tipo_documento;
        $documento->fecha_documento = $request->fecha_documento;
        $documento->estado_documento = $request->estado_documento;
        $documento->observacion_documento = $request->observacion_documento;

        if ($request->hasFile('ruta_documento')) {
            $ruta = $request->file('ruta_documento')->store('documentos', 'public');

            $documento->ruta_documento = $ruta;
        }

        $documento->id_usuario = $request->id_usuario;
        

        $documento->save();

        return redirect()
            ->route('documentos.index')
            ->with('success', 'Documento cargado correctamente.');
    }

    
    public function edit(documentos $documentos)
    {
    return view('documentos.update', compact('documentos'));
    }

    public function update(Request $request, documentos $documentos)
    {
        $request->validate([
            'nombre_documento' => 'required|string|max:255',
            'tipo_documento' => 'required|string|max:255',
            'ruta_documento' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10240',
            'fecha_documento' => 'required|date',
            'estado_documento' => 'required|string|max:255',
            'observacion_documento' => 'nullable|string',
        ]);

        $documentos->nombre_documento = $request->nombre_documento;
        $documentos->tipo_documento = $request->tipo_documento;
        $documentos->fecha_documento = $request->fecha_documento;
        $documentos->estado_documento = $request->estado_documento;
        $documentos->observacion_documento = $request->observacion_documento;

        if ($request->hasFile('ruta_documento')) {
            $ruta = $request->file('ruta_documento')->store('documentos', 'public');

            $documentos->ruta_documento = $ruta;
        }

        $documentos->save();

        return redirect()
            ->route('documentos.index')
            ->with('success', 'Documento actualizado correctamente.');
    }

    public function destroy(documentos $documentos)
    {
        $documentos->delete();

        return redirect()
            ->route('documentos.index')
            ->with('success', 'Documento eliminado correctamente.');
    }
}