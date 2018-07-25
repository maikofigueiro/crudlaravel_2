@extends('partials.layout') 
@section('conteudo')
	
	<section class="margin">
		@foreach($perfis as $perfil)
				<div>
					<h2><a href="{{URL::to('editar/perfil/'.$perfil->id)}}">{{$perfil->titulo}}</a></h2>
				</div>
		@endforeach
		<div>
			<a href="{{URL::to('home')}}">Voltar</a>
		</div>
	</section>

@endsection