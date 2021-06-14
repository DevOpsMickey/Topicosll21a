@extends('layouts.app')

@section('content')
<div class="container">
  <h2>Lista de ventas actuales <a href="{{route('ventas.create')}}"> <button type="button" class="btn btn-success float-right">Agregar venta</button></a> </h2> 
  <h6>
    @if($search and !empty($search) and count($ventas) > 0 )
      <div class="alert alert-success" role="alert">
        El resultado para '{{$search}}' es:
      </div>

    @endif
    @if($search and count($ventas) == 0 )
    <div class="alert alert-danger" role="alert">
      No se encontraron resultados para '{{$search}}'
    </div>  
    @endif

  </h6>
 <table class="table table-hover">
    <thead>
  <tr class="bg-dark">
    <th scope="col">ID</th>
    <th scope="col">Cliente</th>
    <th scope="col">Producto</th>
    <th scope="col">Cantidad</th>
    <th scope="col">Total</th>
    <th scope="col">Fecha</th>
    <th scope="col">Acciones</th>

  </tr>
</thead>
<tbody>
  <?php 
    use App\Models\Clientes;
    use App\Models\Productos;
    ?>
@foreach ($ventas as $venta)
<?php  
  $cliente = Clientes::find($venta->idCliente); 
  $producto = Productos::find($venta->idProducto); 
?>
  <tr>
    <th scope="row">{{$venta->id}}</th>
    <td><?php echo $cliente->name ?></td>
    <td><?php echo $producto->nombreProducto ?></td>
    <td class="text-center">{{$venta->cantidad}}</td>
    <td>${{$venta->total}}</td>
    <td>{{$venta->fecha}}</td>
    <td>
      <form method="POST" action="{{route('ventas.destroy', $venta->id)}}">
      <a href="{{route('ventas.show', $venta->id)}}">
        <button type="button" class="btn btn-secondary"><i class="nav-icon fas fa-eye"></i> Ver</button>
      </a>
      <a href="{{route('ventas.edit', $venta->id)}}">
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
    {{$ventas->links()}}
  </div>
</div>
 
</div>


@endsection
