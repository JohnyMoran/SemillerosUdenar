<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participacion extends Model
{
    use HasFactory;

    protected $table = 'participaciones';
    protected $fillable = [
        'proyecto_id', 'evento_id', 'semillerista_id', 'tipo_participacion',
        'calificacion', 'archivo_certificacion', 'evidencias'
    ];

    public function proyecto()
    {
        return $this->belongsTo(Proyecto::class);
    }

    public function evento()
    {
        return $this->belongsTo(Evento::class);
    }

    public function semillerista()
    {
        return $this->belongsTo(Semillerista::class);
    }
}
