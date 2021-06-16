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
                    <div class="card-header text-center">Ingresa la información del producto</div>
    
                    <div class="card-body">
                        <?php
                        use App\Models\Proveedor;
                        $proveedores = Proveedor::all();
                        ?>
                        <form action="{{route('productos.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="proveedor">Proveedor:</label>
                                <select class="form-control" name="proveedor" >
                                    <option value="0"> Selecciona una opcion</option>
                                    @foreach($proveedores as $proveedor)
                                        <option value="{{$proveedor->id}}"> {{$proveedor->name}}</option>      
                                   @endforeach
                                </select>
                            </div>
                    
                        <div class="form-group">
                            <label for="name">Nombre del producto:</label>
                            <input type="text" class="form-control" name="name" placeholder="Ingresa el nombre del producto"  required>
                        </div>
                        <div class="form-group">
                            <label for="precio">Precio:</label>
                            <input type="number" step="0.01" name="precio"  class="form-control" required >
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="/productos" class="btn btn-danger">Cancelar</a>

                    </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection