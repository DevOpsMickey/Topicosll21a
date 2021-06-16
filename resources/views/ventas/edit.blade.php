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
                        use App\Models\Productos;
                        use App\Models\Clientes;
                        $clientes = Clientes::all();
                        $productos = Productos::all();
                        ?>
                         <div class="form-group">
                            <label for="cliente">Cliente:</label>
                            <select class="form-control" name="cliente" >
                                <option value="0"> Selecciona una opcion</option>
                                @foreach($clientes as $cliente)
                                    @if($cliente->id == $venta->idCliente)         
                                    <option value="{{$cliente->id}}" selected> {{$cliente->name}}</option>
                                    @else
                                    <option value="{{$cliente->id}}"> {{$cliente->name}}</option>      
                                    @endif
                               @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="producto">Producto:</label>
                            <select class="form-control" name="producto" >
                                <option value="0"> Selecciona una opcion</option>
                                @foreach($productos as $producto)
                                    @if($producto->id == $venta->idProducto)         
                                    <option value="{{$producto->id}}" selected> {{$producto->nombreProducto}}</option>
                                    @else
                                    <option value="{{$producto->id}}"> {{$producto->nombreProducto}}</option>      
                                    @endif
                               @endforeach
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