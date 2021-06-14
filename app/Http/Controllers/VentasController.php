<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ventas;
use App\Models\Productos;

class VentasController extends Controller
{
    public function index(Request $request){
        if(!empty ($request)){
            $query = trim($request->get('search'));
            #->get();
            $ventas = Ventas::select('ventas.*')
                  ->join('productos', 'productos.id', '=', 'ventas.idProducto')
                  ->where('nombreProducto', 'LIKE', '%'.$query.'%')->orderBy('id', 'asc')->simplePaginate(10);

            return view('ventas.index',['ventas' => $ventas, 'search' => $query]);
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
        return view('ventas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->get('cliente') == 0 || $request->get('producto') == 0 || $request->get('cantidad') <= 0){
            return redirect('/ventas/create');
        }else{
            $now = new \DateTime();
            $producto = Productos::find($request->get('producto'));

            $total = $producto->precio * $request->get('cantidad');

            Ventas::create([
                'idCliente' => $request->get('cliente'),
                'idProducto' => $request->get('producto'),
                'cantidad' => $request->get('cantidad'),
                'total' => $total,
                'fecha' => $now->format('Y-m-d')
            ]);
            
            return redirect('/ventas');
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
        $ventas = Ventas::findOrFail($id);

        return view('ventas.show',['venta' => $ventas]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('ventas.edit',['venta'=> Ventas::findOrFail($id)]);
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

        if($request->get('cliente') == 0 || $request->get('producto') == 0 || $request->get('cantidad') <= 0){
            return redirect('/ventas');
        }else{

            $venta = Ventas::findOrFail($id);
            
            $venta->idCliente = $request->get('cliente');
            $venta->idProducto = $request->get('producto');
            $venta->cantidad = $request->get('cantidad');

            $producto = Productos::find($request->get('producto'));

            $venta->total = $producto->precio * $request->get('cantidad');

            $venta->update();
            
            return redirect('/ventas');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $venta = Ventas::findOrFail($id);

        $venta->delete();

        return redirect('/ventas');
    }
}
