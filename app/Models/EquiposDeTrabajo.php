<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EquiposDeTrabajo extends Model
{
    protected $fillable = [
        'vehiculo_id',
        'equipo_id',
        'tecnico_id',
    ];

    public function vehiculo()
    {
        return $this->belongsTo(Vehiculo::class);
    }

    public function equipo()
    {
        return $this->belongsTo(Equipo::class);
    }

    public function tecnico()
    {
        return $this->belongsTo(Tecnico::class);
    }

}
