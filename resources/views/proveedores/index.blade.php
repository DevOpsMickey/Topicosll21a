@extends('layouts.app')

@section('content')
<div class="container">
  <h2>Lista de Proveedores <a href="{{route('porveedor.create')}}"> <button type="button" class="btn btn-success float-right">Agregar proveedor</button></a> </h2> 
  <h6>
    @if($search and !empty($search) and count($proveedores) > 0 )
      <div class="alert alert-success" role="alert">
        El resultado para '{{$search}}' es:
      </div>

    @endif
    @if($search and count($proveedores) == 0 )
    <div class="alert alert-danger" role="alert">
      No se encontraron resultados para '{{$search}}'
    </div>  
    @endif

  </h6>
 <table class="table table-hover">
    <thead>
  <tr class="bg-dark"> 
    <th scope="col">ID</th>
    <th scope="col">Nombre</th>
    <th scope="col">Correo</th>
    <th scope="col">Contacto</th>
    <th scope="col">Acciones</th>

     </tr>
</thead>
<tbody>
@foreach ($proveedores as $proveedor)
  <tr>
    <th scope="row">{{$proveedor->id}}</th>
    <td>{{$proveedor->name}}</td>
    <td>{{$proveedor->email}}</td>
    <td>{{$proveedor->phone_number}}</td>
    <td>
      <form method="POST" action="{{route('proveedor.destroy', $proveedor->id)}}">
      <a href="{{route('proveedor.show', $proveedor->id)}}">
        <button type="button" class="btn btn-secondary"><i class="nav-icon fas fa-eye"></i> Ver</button>
      </a>
      <a href="{{route('proveedor.edit', $proveedor->id)}}">
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
  {{$proveedores->links()}}
  </div>
</div>

</div>
@endsection
