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
                    <div class="card-header">Editar información del cliente</div>
    
                    <div class="card-body" style="width: 400px; margin:auto;">
                        <form action="{{route('cliente.update',$cliente->id)}}" method="POST">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="name">Nombre:</label>
                                <input type="text" class="form-control" name="name" placeholder="Ingresa tu nombre" value="{{$cliente->name}}">
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Ingresa tu correo"
                                value="{{$cliente->email}}">
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