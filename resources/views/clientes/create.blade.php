@extends('layouts.app')




@section('content')
<div class='container w-auto'>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">Ingresa la información del cliente</div>
    
                    <div class="card-body">

                        <form action="{{route('cliente.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Nombre:</label>
                                <input type="text" class="form-control" name="name" placeholder="Ingresa tu nombre">
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Ingresa tu correo">
                            </div>
                            <div class="form-group">
                                <label for="password">Telefono:</label>
                                <input type="tel" class="form-control" name="tel"  pattern="[0-9]{10}"
                                required>
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