@extends('layouts.app')




@section('content')
<div class='container w-auto'>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card shadow-lg p-3 mb-5 bg-white rounded">
                    <div class="card-header text-center">Ingresa la información del cliente</div>
    
                    <div class="card-body">

                        <form action="{{route('cliente.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Nombre:</label>
                                <input type="text" class="form-control" name="name" placeholder="Ingresa tu nombre">
                            </div>
                            <div class="form-group">
                                <label for="pais">País:</label>
                                <input type="text" class="form-control" name="pais" placeholder="Ingresa el país donde reside">
                            </div>
                            <div class="form-group">
                                <label for="estado">Estado:</label>
                                <input type="text" class="form-control" name="estado" placeholder="Ingresa el estado donde radica">
                            </div>
                            <div class="form-group">
                                <label for="ciudad">Ciudad:</label>
                                <input type="text" class="form-control" name="ciudad" placeholder="Ingresa la ciudad del proveedor">
                            </div>
                            <div class="form-group">
                                <label for="direccion">Domicilio:</label>
                                <input type="text" class="form-control" name="direccion" placeholder="Ingresa la direción del proveedor">
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
                            <a href="/clientes" class="btn btn-danger">Cancelar</a>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection