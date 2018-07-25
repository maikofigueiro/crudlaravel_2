@extends('partials.layout') 
@section('conteudo')
	
	<section class="margin">
		@foreach($users as $user)
				<div>
					<h2><a href="{{URL::to('editar/usuario/'.$user->id)}}">{{$user->nome}}</a></h2>
				</div>
		@endforeach
		<div>
			<a href="{{URL::to('home')}}">Voltar</a>
		</div>
	</section>

@endsection