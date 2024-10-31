<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Tecnico extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'apellido',
        'DNI',
        'CUIL',
        'telefono',
        'correo',
        'estado'
    ];
}
