<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
     protected $table= 'students';
    use HasFactory;
    protected $fillable = [
        'alumn_DNI',
        'nombre',
        'apellido',
        'asistencias',
        'fecha_nac'
    ];


public function assists() {
    return $this->hasMany(Assist::class, 'id_student', 'id');
}
}
