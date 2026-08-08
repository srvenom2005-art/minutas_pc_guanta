<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    protected $table = 'funcionarios';

    protected $fillable = [
        'cedula',
        'nombre',
        'apellido',
        'cargo',
        'telefono',
        'estatus',
    ];
}