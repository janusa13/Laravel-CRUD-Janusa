<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class assist extends Model
{
    protected $table= 'assists';
    use HasFactory;
    protected $fillable = [
        'id',
        'id_student',
        'created_at',
        'update_at'
    ];

    public function student(){
        return $this->belongsTo(Student::class, 'id_student');
    }
}
