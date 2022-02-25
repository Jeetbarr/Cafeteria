<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicios;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\Storage;

class ServiciosController extends Controller
{
    //

    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {

        $datos['Servicios'] = Servicios::paginate(1);
        return view('Servicios.index', $datos);
    }

    public function create()
    {
        //
        return view('Servicios.create');
    }


    public function show()
    {
        //
        return view('Servicios.index');
    }

    public function store(Request $request)
    {

        $atributos=[
            'ventaServicio'=>'required|string|max:1000',
            'precioServicio'=>'required|integer|max:9999999,min:0',
            'fotoServicio'=>'required|max:10000|mimes:jpeg,png,pgj'
        ];

        $msje=[
            'required'=>'El :attribute es requerido',
            'fotoServicio.required'=>'La foto es requerida'

        ];

        $this->validate($request,$atributos,$msje);

        $datosServicio = request()->all();
        $datosServicio = request()->except('_token');

        if ($request->Hasfile('fotoServicio')) {
            $datosServicio['fotoServicio'] = $request->file('fotoServicio')->store('uploads', 'public');
        }

        Servicios::insert($datosServicio);
        //return response()->json($datosServicio);

        return redirect('Servicios')->with('mensaje','Servicio Añadido Con Exito');
    }

    public function destroy($id)
    {
        $Servici=Servicios::findorFail($id);
        if(!Storage::delete('storage/app/public/uploads',$Servici->fotoServicio)){

        }
        Servicios::destroy($id);

        return redirect('Servicios')->with('mensaje','Servicio Borrado Con Exito');
    }

    public function edit($id)
    {
        $Servici = Servicios::findorFail($id);

        return view('Servicios.editar', compact('Servici'));
    }

    public function update(Request $request, $id)
    {

        $atributos=[
            'ventaServicio'=>'required|string|max:100',
            'precioServicio'=>'required|integer|max:9999999,min:0',

        ];
        $msje=[
            'required'=>':Attribute es requerido para modificar',
        ];
        if ($request->Hasfile('fotoServicio')) {
            $atributos=['fotoServicio'=>'required|max:10000|mimes:jpeg,png,jpg',];
            $msje=['fotoServicio.required'=>'La foto es requerida'];
        }
        $this->validate($request,$atributos,$msje);
        $datosServicio = request()->except(['_token','_method']);

        if ($request->Hasfile('fotoServicio')) {
            $Servici = Servicios::findorFail($id);
            Storage::delete('public/'.$Servici->fotoServicio);
            $datosServicio['fotoServicio'] = $request->file('fotoServicio')->store('uploads', 'public');
        }
        Servicios::where('id','=',$id)->update($datosServicio);


        $Servici = Servicios::findorFail($id);
        //return view('Servicios.editar', compact('Servici'));
        return redirect('Servicios')->with('mensaje','Servicio Modificado Con Exito');
    }
}
