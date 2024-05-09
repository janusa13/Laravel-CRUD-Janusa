<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assist extends Model
{
    protected $table= 'assists';
    use HasFactory;
    protected $fillable = [
        'id',
        'id_student',
        'created_at',
        'updated_at'
    ];

    public function student(){
        return $this->belongsTo(Student::class, 'id_student');
    }

    public function lesson(){
        return $this->belongsTo(Lesson::class);
    }
}
