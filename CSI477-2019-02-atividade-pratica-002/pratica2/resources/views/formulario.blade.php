@extends('layouts.page')

@section('title', 'Formulário')

@section('content_header')
    <h1 class="m-0 text-dark">Requisição de protocolo</h1>
@stop

@section ('itemMenu')
<li class="nav-item ">
    <a class="nav-link " href="http://localhost:8000/home/protocolos">
        <i class="fas fa-archive "></i>
        <p>Protocolos</p>
    </a>
</li>

<li class="nav-item ">
    <a class="nav-link " href="http://localhost:8000/home/formulario">
        <i class="fas fa-book "></i>
        <p>Formulário</p>
    </a>
</li>
@stop

@section('content')

    <form method="post" action="{!! action('UserController@store') !!}">
        {{ csrf_field() }}
            <div class="form-group">
                <label for="protocolo">Protocolo:</label>
                <select name="protocolo" class="custom-select">
                    @foreach ($subjects as $subjects)
                        <option value="{{$subjects->id}}">{{$subjects->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="descricao">Descrição:</label>
                <textarea class="form-control" name="descricao" id="descricao" rows="4" placeholder="Descrição do protocolo"></textarea>
            </div>
            
            <div class="form-group">
                <label for="data">Data:</label>
                <input type="date" name="data" id="data" class="form-control">
            </div>
        <button type="submit" class="btn btn-success">Cadastrar</button>
        <button type="reset" class="btn btn-secondary">Limpar</button>
    </form>

@stop
