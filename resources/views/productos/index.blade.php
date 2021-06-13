@extends('layouts.app')

@section('content')
<div class="container">
  <h2>Lista de productos <a href="{{route('productos.create')}}"> <button type="button" class="btn btn-success float-right">Agregar producto</button></a> </h2> 
  <h6>
    @if($search and !empty($search) and count($productos) > 0 )
      <div class="alert alert-success" role="alert">
        El resultado para '{{$search}}' es:
      </div>

    @endif
    @if($search and count($productos) == 0 )
    <div class="alert alert-danger" role="alert">
      No se encontraron resultados para '{{$search}}'
    </div>  
    @endif

  </h6>
 <table class="table table-hover">
    <thead>
  <tr class="bg-dark">
    <th scope="col">id</th>
    <th scope="col">Proveedor</th>
    <th scope="col">Num Proveedor</th>
    <th scope="col">Producto</th>
    <th scope="col">Precio</th>
    <th scope="col">Acciones</th>


     </tr>
</thead>
<tbody>
@foreach ($productos as $producto)
  <tr>
    <?php 
      $data = DB::select('select * from proveedors where id = :id', ['id' => $producto->idProveedor]);

      ?>
    <th scope="row">{{$producto->id}}</th>
    <td ><?php  echo preg_replace("/[^a-zA-Z0-9]+/", "", json_encode($data[0]->name)); ?></td>
    <td ><?php  echo preg_replace("/[^a-zA-Z0-9]+/", "", json_encode($data[0]->phone_number)); ?></td>
    <td>{{$producto->nombreProducto}}</td>
    <td>${{$producto->precio}}</td>
    <td>
      <form method="POST" action="{{route('productos.destroy', $producto->id)}}">
      <a href="{{route('productos.show', $producto->id)}}">
        <button type="button" class="btn btn-secondary"><i class="nav-icon fas fa-eye"></i> Ver</button>
      </a>
      <a href="{{route('productos.edit', $producto->id)}}">
        <button type="button" class="btn btn-primary"><i class="nav-icon fas fa-edit"></i> Editar</button>
      </a>
        @csrf
        @method('put')
          <button type="submit" class="btn btn-danger" > <i class="nav-icon fas fa-trash"></i> Eliminar</button>
      </form>
    </td>
  </tr>
  @endforeach
</tbody>

</table>
<div class = "row">
  <div class = "mx-auto">
  {{$productos->links()}}
  </div>
</div>

</div>
@endsection
