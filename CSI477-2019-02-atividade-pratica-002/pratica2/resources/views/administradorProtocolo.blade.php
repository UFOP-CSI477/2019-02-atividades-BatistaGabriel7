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
 <table class="table table-hover table-dark" style="color: " >

			<thead class="thead-dark">
			<tr>
				<th>Nome</th>
                <th>Preço</th>
                <th>Editar</th>
                <th>Excluir</th>
			</tr>
			</thead>
			<tbody>
                @foreach ($subjects as $subject)
                    <tr>
                    <td>{{$subject->name}}</td>
                    <td>R$ {{$subject->price}}</td>
                    <td>
                        		<!-- Botão para acionar modal -->
						<button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalEdit{{$subject->id}}">
							Editar
						</button>   
						<!-- Modal -->
						<div class="modal fade" id="modalEdit{{$subject->id}}" tabindex="-1" role="dialog" aria-labelledby="editLabel" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content" style="background-color: black">
									<div class="modal-header">
										<h5 class="modal-title" id="editLabel">Edição de Protocolo</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<form method="post" action="{{route('protocolos.update', $subject)}}">
										<div class="modal-body">
											{{ csrf_field() }}
											@method('put')
											<div class="form-group">
                                                <label for="nome">Nome:</label>
                                            <input value="{{$subject->name}}"type="text" name="nome" id="nome" class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label for="preco">Preço:</label>
                                            <input value="{{$subject->price}}" type="number" name="preco" id="preco" class="form-control">
                                            </div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
											<button type="submit" class="btn btn-primary">Salvar mudanças</button>
										</div>
									</form>
								</div>
							</div>
						</div>
                    </td>
					<td>
					<button type="button" class="btn btn-dark" data-toggle="modal" data-target="#modalExcluir{{$subject->id}}">
							Excluir 
							</button>

							<!-- Modal -->
							<div class="modal fade" id="modalExcluir{{$subject->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content" style="background-color: black">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Excluir Protocolo</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
											<span aria-hidden="true">&times;</span>
											</button>
										</div>
									<form method="post" action="{{route('protocolos.destroy', $subject)}}">
											 {{ csrf_field() }}
											 @method("delete")
											<div class="modal-body">
												Tem certeza que deseja excluir essa requisição?
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
												<button type="delet" class="btn btn-primary">Confirmar</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</td>
					</td>	
                    </td>	
                    </tr>
                @endforeach
			</tbody>
		</table>
@stop
