<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
        'nombre',
        'apellido',
        'telefono',
        'email',
        'tipo_cabello',
        'notas',
    ];

    public function citas()
    {
        return $this->hasMany(Cita::class);
    }
}