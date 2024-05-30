<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registro;
use Illuminate\View\View;
use App\Models\User;

class RegistroController extends Controller
{
    public function index() : View
    {
        $user = auth()->user()->rol;
        if($user=='admin'){
        return view('registros.index', [
            'registros' => Registro::latest()->paginate(10)
        ]);
        }
        else{
            return view('registros.error');
        }
    }
}
