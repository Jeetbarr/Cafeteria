<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clientes;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\Storage;

class ClientesController extends Controller
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

        $datos['Clientes'] = Clientes::paginate(1);
        return view('Clientes.index', $datos);
    }

    public function create()
    {
        //
        return view('Clientes.crear');
    }


    public function show()
    {
        //
        return view('Clientes.index');
    }

    public function store(Request $request)
    {

        $atributos=[
            'nombreCliente'=>'required|string|max:100',
            'id_serviciosCliente'=>'required|string|max:100',
            'rutCliente'=>'required|string|max:100',

            'cantpedidoCliente'=>'required|string|max:100',

        ];

        $msje=[
            'required'=>':Attribute es requerido',


        ];

        $this->validate($request,$atributos,$msje);

        $datosCliente = request()->all();
        $datosCliente = request()->except('_token');



        Clientes::insert($datosCliente);

        return redirect('Clientes')->with('mensaje','Cliente Añadido Con Exito');
    }

    public function destroy($id)
    {
        $Client=Clientes::findorFail($id);

        Clientes::destroy($id);

        return redirect('Clientes')->with('mensaje','Cliente Borrado Con Exito');
    }

    public function edit($id)
    {
        $Client = Clientes::findorFail($id);

        return view('Clientes.editar', compact('Client'));
    }

    public function update(Request $request, $id)
    {

        $atributos=[
            'nombreCliente'=>'required|string|max:100',
            'id_servicios'=>'required|string|max:100',
            'rutCliente'=>'required|string|max:100',
            'cantpedidoCliente'=>'required|string|max:100',



        ];

        $msje=[
            'required'=>':Attribute es requerido para modificar',


        ];


        $this->validate($request,$atributos,$msje);

        $datosCliente = request()->except(['_token','_method']);

        Clientes::where('id','=',$id)->update($datosCliente);


        $Client = Clientes::findorFail($id);
        //return view('Servicios.editar', compact('Servici'));
        return redirect('Clientes')->with('mensaje','Cliente Modificado Con Exito');
    }
}
