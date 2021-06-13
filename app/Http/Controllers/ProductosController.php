<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productos;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        if($request){
            $query = trim($request->get('search'));
            $productos = Productos::where('nombreProducto', 'LIKE', '%'.$query.'%')->orderBy('id', 'asc')->simplePaginate(5);
            #->get();

            return view('productos.index',['productos' => $productos, 'search' => $query]);
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
        return view('Productos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if ($request->get('proveedor') == 0 || $request->get('precio') == 0 || $request->get('name') == ''){
            return redirect('/productos');
        }else{
            Productos::create([
                'nombreProducto' => $request->get('name'),
                'precio' => $request->get('precio'),
                'idProveedor' => $request->get('proveedor')
            ]);
            return redirect('/productos');
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
        $producto = Productos::findOrFail($id);

        return view('productos.show',['producto' => $producto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('productos.edit',['producto'=> Productos::findOrFail($id)]);
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
        
        if($request->get('proveedor') == 0){
            return redirect('/productos');
        }

        $productos = Productos::findOrFail($id);

        $productos->idProveedor = $request->get('proveedor');
        $productos->nombreProducto = $request->get('name');
        $productos->precio = $request->get('precio');


        $productos->update();

        return redirect('/productos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Productos = Productos::findOrFail($id);

        $Productos->delete();

        return redirect('/productos');
    }
}
