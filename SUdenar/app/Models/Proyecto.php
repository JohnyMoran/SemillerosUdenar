<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo', 'titulo', 'integrantes', 'tipo_proyecto', 'estado', 'fecha_inicio', 'fecha_finalizacion',
        'archivo_propuesta', 'archivo_proyecto_final', 'semillero_id'
    ];

    public function semilleros()
    {
        return $this->belongsToMany(Semillero::class, 'semillero_proyecto')
        ->withTimestamps();
    }

    public function eventos()
    {
        return $this->belongsToMany(Evento::class, 'evento_proyecto')
            ->withTimestamps();
    }

    public function semilleristas()
    {
        return $this->belongsToMany(semillerista::class, 'semillerista_proyecto')
            ->withTimestamps();
    }

    public function participaciones()
    {
        return $this->hasMany(Participacion::class);
    }
    public function eventosVinculados()
    {
        return $this->hasMany(EventoProyecto::class, 'proyecto_id');
    }
}
