<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clientes;

class ClientesController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        if($request){
            $query = trim($request->get('search'));
            $Clientes = Clientes::where('name', 'LIKE', '%'.$query.'%')->orderBy('id', 'asc')->simplePaginate(5);
            #->get();

            return view('clientes.index',['clientes' => $Clientes, 'search' => $query]);
        }
        /** $users = User::all();
        * return view('usuarios.index',['users' => $users]); 
        **/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if (request('name') == '' || request('email') == '' || request('pais') == "" || request('estado') == '' || request('ciudad') == '' || request('direccion') == ''){
            return redirect('/clientes/create');
        }else{
            Clientes::create([
                'name' => request('name'),
                'email' => request('email'),
                'pais' => request('pais'),
                'estado' => request('estado'),
                'ciudad' => request('ciudad'),
                'direccion' => request('direccion'),
                'phone_number' => request('tel'),

            ]);
            
            return redirect('/clientes');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente = Clientes::findOrFail($id);

        return view('clientes.show',['cliente' => $cliente]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('clientes.edit',['cliente'=> Clientes::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cliente = Clientes::findOrFail($id);
        
        $cliente->name = $request->get('name');
        $cliente->email = $request->get('email');
        $cliente->pais = $request->get('pais');
        $cliente->estado = $request->get('estado');
        $cliente->ciudad = $request->get('ciudad');
        $cliente->direccion = $request->get('direccion');

        $cliente->update();
        
        return redirect('/clientes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente = Clientes::findOrFail($id);

        $cliente->delete();

        return redirect('/clientes');
    }
}
