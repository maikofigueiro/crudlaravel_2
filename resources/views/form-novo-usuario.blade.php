@extends('partials.layout') 
@section('conteudo')
	<section class="margin">
		<h2>Cadastrar Novo Usuário</h2>
		<form class="form links" id="add-usuario" data-action="{{URL::to('novo-usuario')}}">
			<div>
				<label>Nome</label>
				<input class="js_campo" type="text" name="nome">
			</div>
			<div>
				<label>Email</label>
				<input class="js_campo" type="email" name="email">
			</div>
			<div>
				<label>Senha</label>
				<input class="js_campo" type="password" name="password">
			</div>
			<div>
				<label>Perfil</label>
				{!! Form::select('perfil[]', $perfil, 'multiple', ['multiple'=>'', 'id' => 'perfil']) !!}
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