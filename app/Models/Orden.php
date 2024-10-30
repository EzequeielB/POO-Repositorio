<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    protected $fillable = [
        'descripcion',
        'equipo_id',
        'cliente_id',
        'tipo_id',
        'estado_id'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function equipo()
    {
        return $this->belongsTo(Equipo::class);
    }

    public function estado()
    {
        return $this->belongsTo(Estado::class);
    }
    
    public function tipo()
    {
        return $this->belongsTo(Tipos::class);
    }
    

        public function mostrarDatosCliente()
    {
        return $this->id . " - " . $this->clientes->nombre;
    } 
}
