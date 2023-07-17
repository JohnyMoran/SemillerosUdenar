<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coordinador extends Model
{
    use HasFactory;

    protected $table = 'coordinadores'; // Nombre de la tabla en la base de datos
    protected $fillable = [
        'nombre', 'identificacion', 'direccion', 'telefono', 'correo', 'genero',
        'foto', 'fecha_nacimiento', 'programa_academico', 'areas_conocimiento',
        'fecha_vinculacion', 'acuerdo_nombramiento', 'foto'
    ];

    public function semilleros()
    {
        return $this->belongsToMany(Semillero::class, 'coordinador_semillero')
            ->withTimestamps();
    }
}
