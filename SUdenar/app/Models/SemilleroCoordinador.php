<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SemilleroCoordinador extends Model
{
    use HasFactory;

    protected $table = 'coordinador_semillero';
    protected $fillable = [
        'semillero_id', // Agrega aquí el campo semillero_id
        'coordinador_id', // Agrega aquí otros campos si los tienes
    ];

    public function coordinador()
    {
        return $this->belongsTo(Coordinador::class);
    }
    
    public function semillero()
    {
        return $this->belongsTo(Semillero::class);
    }

}
