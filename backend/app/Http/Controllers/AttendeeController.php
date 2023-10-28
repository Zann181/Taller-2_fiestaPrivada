<?php

namespace App\Http\Controllers;

use App\Models\Attendee;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AttendeeController extends Controller
{
    // Listar todos los asistentes
    public function index()
    {
        return response()->json(Attendee::all());
    }

    // Registrar un nuevo asistente
    public function store(Request $request)
    {
        $data = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'age' => 'required|integer|min:0|max:120',
            'number_of_guests' => 'required|integer|min:0'
        ]);

        $data['entry_time'] = Carbon::now()->toDateTimeString();

        
        $attendee = Attendee::create($data);
        
        return response()->json($attendee, 201);
    }

    // Mostrar detalles de un asistente específico
    public function show(Attendee $attendee)
    {
        return response()->json($attendee);
    }

    // Actualizar un asistente específico
    public function update(Request $request, Attendee $attendee)
    {
        $data = $request->validate([
            'first_name' => 'sometimes|required|string|max:255',
            'last_name' => 'sometimes|required|string|max:255',
            'age' => 'sometimes|required|integer|min:0|max:120',
            'entry_time' => 'sometimes|required|date_format:Y-m-d H:i:s',
            'number_of_guests' => 'sometimes|required|integer|min:0'
        ]);

        $attendee->update($data);
        
        return response()->json($attendee);
    }

    // Eliminar un asistente específico
    public function destroy(Attendee $attendee)
    {
        $attendee->delete();
        
        return response()->json(['message' => 'Attendee deleted successfully']);
    }
}
