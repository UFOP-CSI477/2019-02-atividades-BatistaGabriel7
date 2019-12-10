@extends('layouts.page')

@section('title', 'Home')

@section('content_header')
    <h1 class="m-0 text-dark">PRÁTICA 2</h1>
@stop

@section ('itemMenu')
<li class="nav-item ">
    <a class="nav-link " href="http://localhost:8000/administrador/listaProtocolos">
        <i class="fas fa-archive "></i>
        <p>Protocolos</p>
    </a>
</li>

<li class="nav-item ">
    <a class="nav-link " href="http://localhost:8000/administrador/registro">
        <i class="fas fa-book "></i>
        <p>Formulário</p>
    </a>
</li>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <p class="mb-0">Loggin efetuado com sucesso!</p>
                </div>
            </div>
        </div>
    </div>
@stop
