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
                <div class="card shadow-lg p-3 mb-5 bg-white rounded">
                    <div class="card-header text-center">Información del Cliente</div>
                    <div class="card-body">
                    <p class="h3 font-weight-light text-warning text-center">DIRECCIÓN</p>
                    <h2 class="text-left font-weight-light">{{$cliente->pais}} <br>
                        {{$cliente->estado}}-{{$cliente->ciudad}} <br>
                        {{$cliente->direccion}} <br><br>

                    </h2>
                    <p class="h3 font-weight-light text-warning text-center">CONTACTO</p>
                  
                    <p style="font-size: 18px;">
                        <i class="ml-5">{{$cliente->name}}</i>
                        <br>
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-envelope-fill mr-3" viewBox="0 0 16 16">
                            <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/>
                          </svg>
                        {{$cliente->email}}
                    </p>
                    
                    
                    
                    <a href="/clientes">
                        <button type="btn" class="btn btn-secondary ml-3 mb-3 float-right">	&#8592; Atras</button>
                    </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection