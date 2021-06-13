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
                <div class="card">
                    <div class="card-header">Editar información de productos</div>
    
                    <div class="card-body" style="width: 400px; margin:auto;">
                        <form action="{{route('productos.update',$producto->id)}}" method="POST">
                            @csrf
                            @method('put')
                            <?php 
                                $data = DB::select('select * from proveedors');
                            ?>
                            <div class="form-group">
                                <label for="proveedor">Proveedor:</label>
                                <select class="form-control" name="proveedor" >
                                    <option value="0"> Selecciona una opcion</option>
                                    <?php 
                                        foreach ($data as $proveedor) {
                                            if ($producto->idProveedor == $proveedor->id) {
                                                    echo '<option 
                                                value="'.preg_replace("/[^a-zA-Z0-9]+/", "", json_encode($proveedor->id)).'" selected>'.
                                                preg_replace("/[^a-zA-Z0-9]+/", "", json_encode($proveedor->name)).'   
                                                </option>';
                                            }else{
                                                echo '<option 
                                                value="'.preg_replace("/[^a-zA-Z0-9]+/", "", json_encode($proveedor->id)).'">'.
                                                preg_replace("/[^a-zA-Z0-9]+/", "", json_encode($proveedor->name)).'   
                                                </option>';
                                            }
                                        }    
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name">Nombre del producto:</label>
                                <input type="text" class="form-control" name="name" placeholder="Ingresa el nombre del producto" value="{{$producto->nombreProducto}}">
                            </div>
                            <div class="form-group">
                                <label for="precio">Precio:</label>
                                <input type="number" step="0.01" name="precio" value="{{$producto->precio}}" class="form-control" >
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