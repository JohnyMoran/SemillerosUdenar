<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semillero extends Model
{
    use HasFactory;

    protected $fillable = [
        // Lista de campos permitidos para asignación masiva
        'nombre',
        'correo',
        'logo',
        'descripcion',
        'mision',
        'vision',
        'valores',
        'objetivos',
        'lineas_investigacion',
        'archivo_presentacion',
        'numero_resolucion_creacion',
        'fecha_resolucion_creacion',
        'archivo_resolucion_creacion',
    ];

    public function semilleristas()
    {
        return $this->belongsToMany(Semillerista::class, 'semillero_semillerista')
            ->withTimestamps();
    }


    public function proyectos()
    {
        return $this->belongsToMany(Proyecto::class, 'semillero_proyecto')
        ->withTimestamps();
    }

    public function coordinador()
    {
        return $this->belongsTo(Coordinador::class);
    }

    public function coordinadores()
    {
        return $this->belongsToMany(Coordinador::class, 'coordinador_semillero')
            ->withTimestamps();
    }
    public function coordinadorAsignado()
    {
        return $this->hasOne(SemilleroCoordinador::class);
    }

}
