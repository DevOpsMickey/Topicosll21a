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
                    <div class="card-header">Información del producto</div>
                    <div class="card-body">
                    <?php 
                        $data = DB::select('select * from proveedors where id = :id', ['id' => $producto->idProveedor]);
                    ?>
                    <p class="h4"><strong>Proveedor:</strong>  <?php  echo preg_replace("/[^a-zA-Z0-9]+/", "", json_encode($data[0]->name)); ?> </p>
                    <p class="h4"><strong>Teléfono:</strong>  <?php  echo preg_replace("/[^a-zA-Z0-9]+/", "", json_encode($data[0]->phone_number)); ?></p>
                    <p class="h4"><strong>Producto:</strong> {{$producto->nombreProducto}}</p>
                    <p class="h4"><strong>Precio:</strong> ${{$producto->precio}}</p>
                    <br>
                    <a href="/usuarios">
                        <button type="btn" class="btn btn-secondary ml-3 mb-3 float-right">	&#8592; Atras</button>
                    </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
