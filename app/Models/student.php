<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    use HasFactory;
    protected $fillable = [
        'alumn_DNI',
        'nombre',
        'apellido',
        'asistencias',
        'fecha_nac'
    ];
}
