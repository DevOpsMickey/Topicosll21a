@extends('layouts.app')


@section('content')
<div class='container w-auto'>
    <div class='row'>
        <div class="col-sm-4" style="margin: auto;">
            
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Información del usuario</div>
                    <div class="card-body">
                    <p class="h4"><strong>Nombre:</strong>  {{$user->name}}</p>
                    <p class="h4"><strong>Email:</strong> {{$user->email}}</p>
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