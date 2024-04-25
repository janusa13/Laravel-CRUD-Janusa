<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\StudentController;

class ApiController extends Controller
{
    public function condicionStudent($id){
      $asist=Assist::find($id);
        
        // (asistencias /clases)

    }
}
