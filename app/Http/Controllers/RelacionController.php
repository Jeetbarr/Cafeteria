<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use App\Models\Servicios;
use Illuminate\Http\Request;


class RelacionController extends Controller
{
    //
    public function index(){
        $Clientes = Clientes::all();
        return view('relacion', compact('Clientes'));
    }
}
