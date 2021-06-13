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
                    <div class="card-header">Ingresa la información del usuarios</div>
    
                    <div class="card-body">

                        <form action="{{route('usuarios.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Nombre:</label>
                                <input required type="text" class="form-control" name="name" placeholder="Ingresa tu nombre">
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input required type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Ingresa tu correo">
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" name="password" placeholder="Password" required>
                                <small id="emailHelp" class="form-text text-muted">Nunca compartas tu contraseña.</small>
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