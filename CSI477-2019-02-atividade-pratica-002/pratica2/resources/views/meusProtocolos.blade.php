@extends('layouts.page')

@section('title', 'Meus protocolos')

@section('content_header')
    <h1 class="m-0 text-dark">Protocolos</h1>
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
    <table class="table table-hover table-dark" >

			<thead class="thead-dark">
			<tr>
				<th>Nome</th>
				<th>Data</th>
				<th>Descrição</th>
				<th>Editar</th>
				<th>Excluir</th>
			</tr>
			</thead>


			<tbody>
			@foreach ($requests as $request)
				<tr>
					<td>{{$request->name}}</td>
					<td>{{$request->date}}</td>
					<td>{{$request->description}}</td>
					<td>
								<!-- Botão para acionar modal -->
						<button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalEdit{{$request->id}}">
							Editar requisição
						</button>   
						<!-- Modal -->
						<div class="modal fade" id="modalEdit{{$request->id}}" tabindex="-1" role="dialog" aria-labelledby="editLabel" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content" style="background-color: black">
									<div class="modal-header">
										<h5 class="modal-title" id="editLabel">Edição de Protocolo</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<form method="post" action="{{route('requisicao.update', $request)}}">
										<div class="modal-body">
											{{ csrf_field() }}
											@method('put')
											<div class="form-group">
												<label>Protocolo:<span class="text-danger"></span></label>
												<select value="{{$request->subjectid}}"name="protocolo" id="protocolo" class="form-control" required>
													@foreach ($subjects as $subject)
														<option value="{{$subject->id}}">{{$subject->name}}</option>
													@endforeach
												</select>
											</div>
											<div class="form-group">
												<label>Data:<span class="text-danger"></span></label>
												<input value="{{$request->date}}" type="date" name="data" id="data" class="form-control" placeholder="Insira uma data" required>
											</div>
											<div class="form-group">
												<label>Descrição<span class="text-danger"></span></label>
												<textarea rows="3" name="descricao" id="descricao" class="form-control" placeholder="Insira sua descrição" required>{{$request->description}}</textarea>
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
					<td>
							<!-- Botão para acionar modal -->
					<button type="button" class="btn btn-dark" data-toggle="modal" data-target="#modalExcluir{{$request->id}}">
							Excluir requisição
							</button>

							<!-- Modal -->
							<div class="modal fade" id="modalExcluir{{$request->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content" style="background-color: black">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Excluir Requisição</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
											<span aria-hidden="true">&times;</span>
											</button>
										</div>
									<form method="post" action="{{route('requisicao.destroy', $request)}}">
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
				</tr>
			@endforeach
			</tbody>
		</table>
@stop
