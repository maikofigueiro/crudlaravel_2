@extends('partials.layout') 
@section('conteudo')
	<section class="margin">
		<h2>Cadastrar Perfil</h2>
		<form class="form links" id="add-perfil" data-action="{{URL::to('novo-perfil')}}">
			<div>
				<label>Título</label>
				<input class="js_campo" type="text" name="titulo">
			</div>
			<div>
				<button type="submit">Salvar</button>
			</div>
		</form>
		<div>
			<a href="{{URL::to('home')}}">Voltar</a>
		</div>
	</section>
@endsection