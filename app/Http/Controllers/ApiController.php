<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Assist;

class ApiController extends Controller
{
    public function condicionStudent($id){
        $clases=20;
      $asist=Assist::find($id)->count();
        $cant= $asist/$clases;
        // (asistencias /clases)

    }
}
