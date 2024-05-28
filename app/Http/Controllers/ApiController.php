<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Assist;
use App\Models\Lesson;

class ApiController extends Controller
{
    public function condicionStudent($id){
        $clases=Lesson::first();
        if($clases){
        $lessons=$clases->lessons;
        $regular=$clases->regular;
        $promocion=$clases->promocion;
        $condicion="";
      $asist=Assist::find($id)->count();
        $cant= $asist/$lessons;
        $cant=$cant*100;
        if($cant<$regular){
          $condicion="LIBRE";
        }elseif ($cant>$regular && $cant<$promocion) {
          $condicion="REGULAR";
        }else {
          $condicion="PROMOCIONADO";
        }
      return $condicion;
        }else{
          return"No hay clases registradas";
        }
    }
}
