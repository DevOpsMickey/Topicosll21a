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
                <div class="card shadow-lg p-3 mb-5 bg-white rounded">
                    <div class="card-header text-center">Ingresa la información de la venta</div>
    
                    <div class="card-body">

                        <form action="{{route('ventas.store')}}" method="POST">
                            @csrf
                            <?php 
                            $clientes = DB::select('select * from clientes');
                            $productos = DB::select('select productos.*, proveedors.name from productos INNER JOIN proveedors ON productos.idProveedor = proveedors.id');
                            ?>
                            <div class="form-group">
                                <label for="cliente">Cliente:</label>
                                <select class="form-control" name="cliente" required>
                                    <option value="0"> Selecciona una opcion</option>
                                    <?php 
                                        foreach ($clientes as $cliente) {
                                                echo '<option 
                                                value="'.preg_replace("/[^a-zA-Z0-9]+/", "", json_encode($cliente->id)).'">'.
                                                str_replace('"', "", json_encode($cliente->name)).'   
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
                                                value="'.preg_replace("/[^a-zA-Z0-9]+/", "", json_encode($producto->id)).'">'.'Proveedor: "'.
                                                str_replace('"', "", json_encode($producto->name)).'"  ('.
                                                str_replace('"', "", json_encode($producto->nombreProducto)).')   
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
                            <a href="/ventas" class="btn btn-danger">Cancelar</a>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection