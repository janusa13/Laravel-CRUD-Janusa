<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function condicionStudent($id){
        
        $asistencias=Student::getAssistencias($id);

        dd($assist->cant);
        
        // (asistencias /clases)

    }
}
