<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asistente extends Model
{
    use HasFactory;

    // Definir la tabla (opcional si sigue la convención de nombres)
    protected $table = 'asistentes';

    // Campos asignables de forma masiva
    protected $fillable = [
        'nombre',
        'apellido',
        'edad',
        'hora_ingreso',
        'cant_acompañantes'
    ];
}