<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proveedor;

class ProveedorController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        if($request){
            $query = trim($request->get('search'));
            $proveedores = Proveedor::where('name', 'LIKE', '%'.$query.'%')->orderBy('id', 'asc')->simplePaginate(5);
            #->get();

            return view('proveedores.index',['proveedores' => $proveedores, 'search' => $query]);
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
        return view('proveedores.create');
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
            return redirect('/proveedor/create');
        }else{
            Proveedor::create([
                'name' => request('name'),
                'pais' => request('pais'),
                'estado' => request('estado'),
                'ciudad' => request('ciudad'),
                'direccion' => request('direccion'),
                'email' => request('email'),
                'phone_number' => request('tel')
            ]);
            
            return redirect('/proveedor');
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
        $proveedor = Proveedor::findOrFail($id);

        return view('proveedores.show',['proveedor' => $proveedor]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('proveedores.edit',['proveedor'=> Proveedor::findOrFail($id)]);
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
        $proveedor = Proveedor::findOrFail($id);
        
        $proveedor->name = $request->get('name');
        $proveedor->email = $request->get('email');
        $proveedor->phone_number = $request->get('tel');
        $proveedor->pais = $request->get('pais');
        $proveedor->estado = $request->get('estado');
        $proveedor->ciudad = $request->get('ciudad');
        $proveedor->direccion = $request->get('direccion');
        $proveedor->update();
        
        return redirect('/proveedor');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $proveedor = Proveedor::findOrFail($id);

        $proveedor->delete();

        return redirect('/proveedor');
    }
}
