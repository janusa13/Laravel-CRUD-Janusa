<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    protected $table='verificar';
    use HasFactory;
    protected $fillable=[
        'hora',
        'user',
        'fecha',
        'accion',
        'navegador',
        'ip'
    ];
}
