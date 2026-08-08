<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoIncidente extends Model
{
    use HasFactory;

    // Nombre explícito de la tabla en MySQL
    protected $table = 'tipos_incidentes';

    // Campos permitidos para inserción/edición
    protected $fillable = [
        'nombre',
        'descripcion',
        'nivel_riesgo',
    ];
}