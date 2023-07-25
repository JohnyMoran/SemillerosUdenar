<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventoProyecto extends Model
{
    use HasFactory;

    protected $table = 'evento_proyecto';
    protected $fillable = [
        'evento_id', 
        'proyecto_id',
    ];

    // Relación con el modelo Evento
    public function evento()
    {
        return $this->belongsTo(Evento::class, 'evento_id');
    }

    // Relación con el modelo Proyecto
    public function proyecto()
    {
        return $this->belongsTo(Proyecto::class, 'proyecto_id');
    }
    
    
    
}
