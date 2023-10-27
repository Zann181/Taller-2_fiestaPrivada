<?php

namespace App\Http\Controllers;

use App\Models\Asistente;
use Illuminate\Http\Request;


class AsistentesController extends Controller
{
    // Método para registrar un nuevo asistente
    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'edad' => 'required|integer|min:0|max:120',
            'cant_acompañantes' => 'required|integer|min:0'
        ]);

        // La hora de ingreso se marca automáticamente
        $data['hora_ingreso'] = now();

        $asistente = Asistente::create($data);

        return response()->json(['message' => 'Asistente registrado con éxito', 'data' => $asistente], 201);
    }

    // Método para obtener la lista de todos los asistentes
    public function index()
    {
        $asistentes = Asistente::all();
        return response()->json($asistentes);
    }

    // Método para obtener un asistente específico por ID
    public function show($id)
    {
        $asistente = Asistente::find($id);

        if (!$asistente) {
            return response()->json(['message' => 'Asistente no encontrado'], 404);
        }

        return response()->json($asistente);
    }

    // Método para actualizar un asistente específico por ID
    public function update(Request $request, $id)
    {
        $asistente = Asistente::find($id);

        if (!$asistente) {
            return response()->json(['message' => 'Asistente no encontrado'], 404);
        }

        $data = $request->validate([
            'nombre' => 'string|max:255',
            'apellido' => 'string|max:255',
            'edad' => 'integer|min:0|max:120',
            'cant_acompañantes' => 'integer|min:0'
        ]);

        $asistente->update($data);

        return response()->json(['message' => 'Asistente actualizado con éxito', 'data' => $asistente]);
    }

    // Método para eliminar un asistente específico por ID
    public function destroy($id)
    {
        $asistente = Asistente::find($id);

        if (!$asistente) {
            return response()->json(['message' => 'Asistente no encontrado'], 404);
        }

        $asistente->delete();

        return response()->json(['message' => 'Asistente eliminado con éxito']);
    }
}
