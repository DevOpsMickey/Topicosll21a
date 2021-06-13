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
                    <div class="card-header">Información de la venta</div>
    
                    <div class="card-body">
                    <?php 
                    use App\Models\Clientes;
                    use App\Models\Productos;
                    use App\Models\Proveedor;

                    $cliente = Clientes::find($venta->idCliente); 
                    $producto = Productos::find($venta->idProducto); 
                    $proveedor = Proveedor::find($producto->idProveedor); 
                    ?>
                    <p class="h4"> <strong>Cliente:</strong> {{$cliente->name}}</p>
                    <p class="h4"><strong>Producto: </strong> {{$producto->nombreProducto}}</p>
                    <p class="h4"><strong>Cantidad:</strong>  {{$venta->cantidad}}</p>
                    <p class="h4"><strong>Total:</strong> ${{$venta->total}}</p>
                    <p class="h4"><strong>Proveedor:</strong> {{$proveedor->name}}</p>
                    <br>
                    <a href="/ventas">
                        <button type="btn" class="btn btn-secondary ml-3 mb-3 float-right">	&#8592; Atras</button>
                    </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection