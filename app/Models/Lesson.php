<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $table='lessons';
    use HasFactory;
    protected $fillable=[
        'id',
        'lessons',
        'promocion',
        'regular',
    ];
    public function assist(){
        return $this->hasMany(lesson::class);
    }
}
