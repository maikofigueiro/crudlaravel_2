@extends('partials.layout') 
@section('conteudo')
	
	<section class="margin">
		@foreach($perfil->perfil as $paginas)
			@if($paginas->titulo == 'Admin')
				<div>
					<h2><a href="{{URL::to('novo-usuario')}}">Cadastrar novo USUÁRIO</a></h2>
					<h4><a href="{{URL::to('lista-usuario')}}">Editar USUÁRIOS</a></h4>
				</div>
				<div>
					<h2><a href="{{URL::to('novo-perfil')}}">Cadastrar novo PERFIL</a></h2>
					<h4><a href="{{URL::to('lista-perfil')}}">Editar PERFIS</a></h4>
				</div>
			@else
				<div>
					<h2><a href="{{URL::to(strtolower($paginas->titulo))}}">{{$paginas->titulo}}</a></h2>
				</div>
			@endif
		@endforeach
		<div>
			<a href="{{URL::to('login/sair')}}">Sair</a>
		</div>
	</section>

@endsection