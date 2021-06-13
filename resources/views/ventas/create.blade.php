@extends('layouts.app')


@section('content')
<div class='container w-auto'>
    <div class='row'>
        <div class="col-sm-4" style="margin: auto;">
            
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">Ingresa la información de la venta</div>
    
                    <div class="card-body">

                        <form action="{{route('ventas.store')}}" method="POST">
                            @csrf
                            <?php 
                            $clientes = DB::select('select * from clientes');
                            $productos = DB::select('select * from productos');
                            ?>
                            <div class="form-group">
                                <label for="cliente">Cliente:</label>
                                <select class="form-control" name="cliente" required>
                                    <option value="0"> Selecciona una opcion</option>
                                    <?php 
                                        foreach ($clientes as $cliente) {
                                                echo '<option 
                                                value="'.preg_replace("/[^a-zA-Z0-9]+/", "", json_encode($cliente->id)).'">'.
                                                preg_replace("/[^a-zA-Z0-9]+/", "", json_encode($cliente->name)).'   
                                                </option>';
                                        }    
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="proveedor">Producto:</label>
                                <select class="form-control" name="producto" required>
                                    <option value="0"> Selecciona una opcion</option>
                                    <?php 
                                        foreach ($productos as $producto) {
                
                                                echo '<option 
                                                value="'.preg_replace("/[^a-zA-Z0-9]+/", "", json_encode($producto->id)).'">'.
                                                preg_replace("/[^a-zA-Z0-9]+/", "", json_encode($producto->nombreProducto)).'   
                                                </option>';
                                        }    
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="cantidad">Cantidad:</label>
                                <input type="number" step="1" name="cantidad"  class="form-control" required>
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Guardar</button>
                            <button type="btn" class="btn btn-danger">Cancelar</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection