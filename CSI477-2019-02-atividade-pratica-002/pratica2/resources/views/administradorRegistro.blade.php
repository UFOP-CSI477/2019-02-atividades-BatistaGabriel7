@extends('adminlte::page')

@section('title', 'Formulário')

@section('content_header')
    <h1 class="m-0 text-dark">Criação de protocolo</h1>
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
    <form action="{!! action('AdministradorController@store') !!}" method="post">
        @csrf
        <div class="form-group">
            <label name="nome">Nome:<span class="text-danger"></span></label>
            <input name="nome" type="text" id="nome" class="form-control" placeholder="Insira o nome do protocolo" required>
        </div>
        <div class="form-group">
            <label name="preco">Preço:<span class="text-danger"></span></label>
            <input name="preco" type="number" id="preco" class="form-control" placeholder="Insira um preço" required>
        </div>
        <div class="form-group">
            <button type="submit" name="submit" value="submit" id="submit" class="btn btn-success">Confirmar</button>
        </div>
    </form>
@stop
