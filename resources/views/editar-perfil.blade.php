@extends('partials.layout') 
@section('conteudo')
	<section class="margin">
		<h2>Cadastrar Perfil</h2>
		<form class="form links" id="add-perfil" data-action="{{URL::to('editar-perfil')}}">
			<div>
				<label>Título</label>
				<input class="js_campo" type="text" name="titulo" value="{{$perfil->titulo}}">
			</div>
			<div>
				<button type="submit">Salvar</button>
				<input type="hidden" name="id" value="{{$perfil->id}}">
			</div>
		</form>
		<div>
			<button data-action="{{URL::to('excluir-perfil')}}" class="excluir_perfil excluir" id="{{$perfil->id}}">Excluir perfil {{$perfil->titulo}}</button>
		</div>
		<br>
		<br>
		<div>
			<a href="{{URL::to('home')}}">Voltar</a>
		</div>
	</section>
@endsection