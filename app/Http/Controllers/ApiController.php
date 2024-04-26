<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Assist;

class ApiController extends Controller
{
    public function condicionStudent($id){
        $clases=2;
        $condicion="";
      $asist=Assist::find($id)->count();
        $cant= $asist/$clases;
        $cant=$cant*100;
        echo($cant);
        if($cant<60){
          $condicion="LIBRE";
        }elseif ($cant>60 && $cant<80) {
          $condicion="REGULAR";
        }else {
         $condicion="PROMOCIONADO";
        }
      return $condicion;
    }
}
