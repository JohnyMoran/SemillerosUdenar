<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo', 'nombre', 'descripcion', 'fecha_inicio', 'fecha_fin', 'lugar',
        'tipo', 'modalidad', 'clasificacion', 'observaciones'
    ];

    public function proyectos()
    {
        return $this->belongsToMany(Proyecto::class, 'evento_proyecto')
            ->withTimestamps();
    }

    public function participaciones()
    {
        return $this->hasMany(Participacion::class);
    }

    public function semillerista()
    {
        return $this->belongsToMany(Estudiante::class, 'semillerista_evento')
            ->withPivot(['tipo_participacion', 'calificacion', 'archivo_certificacion', 'evidencias'])
            ->withTimestamps();
    }
    public function proyectosVinculados()
    {
        return $this->hasMany(EventoProyecto::class, 'evento_id');
    }
}
