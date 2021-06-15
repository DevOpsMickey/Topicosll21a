@extends('layouts.app')


@section('content')
<div class='container w-auto'>
    <div class='row'>
        <div class="col-sm-4" style="margin: auto;">
            
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg p-3 mb-5 bg-white rounded">
                    <div class="card-header text-center">Editar información de venta</div>
    
                    <div class="card-body" style="width: 400px; margin:auto;">
                        <form action="{{route('ventas.update',$venta->id)}}" method="POST">
                        @csrf
                        @method('put')
                        <?php 
                        $clientes = DB::select('select * from clientes');
                        $productos = DB::select('select * from productos');
                        ?>
                        <div class="form-group">
                            <label for="cliente">Cliente:</label>
                            <select class="form-control" name="cliente" >
                                <option value="0"> Selecciona una opcion</option>
                                <?php 
                                    foreach ($clientes as $cliente) {
                                        if ($venta->idCliente == $cliente->id) {
                                                echo '<option 
                                            value="'.preg_replace("/[^a-zA-Z0-9]+/", "", json_encode($cliente->id)).'" selected>'.
                                            str_replace('"', "", json_encode($cliente->name)).'   
                                            </option>';
                                        }else{
                                            echo '<option 
                                            value="'.preg_replace("/[^a-zA-Z0-9]+/", "", json_encode($cliente->id)).'">'.
                                            str_replace('"', "", json_encode($cliente->name)).'   
                                            </option>';
                                        }
                                    }    
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="proveedor">Producto:</label>
                            <select class="form-control" name="producto" >
                                <option value="0"> Selecciona una opcion</option>
                                <?php 
                                    foreach ($productos as $producto) {
                                        if ($venta->idProducto == $producto->id) {
                                                echo '<option 
                                            value="'.preg_replace("/[^a-zA-Z0-9]+/", "", json_encode($producto->id)).'" selected>'.
                                            preg_replace("/[^a-zA-Z0-9]+/", "", json_encode($producto->nombreProducto)).'   
                                            </option>';
                                        }else{
                                            echo '<option 
                                            value="'.preg_replace("/[^a-zA-Z0-9]+/", "", json_encode($producto->id)).'">'.
                                            preg_replace("/[^a-zA-Z0-9]+/", "", json_encode($producto->nombreProducto)).'   
                                            </option>';
                                        }
                                    }    
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="cantidad">Cantidad:</label>
                            <input required type="number" step="1" name="cantidad" value="{{$venta->cantidad}}" class="form-control" >
                        </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                    <a href="/ventas" class="btn btn-danger">Cancelar</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection