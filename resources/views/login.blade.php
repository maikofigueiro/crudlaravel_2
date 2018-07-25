@extends('partials.layout') 
@section('conteudo')
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                Teste AutoGestor
            </div>
            <form action="{{ URL::to('login') }}" method="post">
                {{ csrf_field() }}
                <div class="links">
                	<div>
	                	<label>Nome</label>
	                    <input type="email" name="email">
	                </div>
	                <div>
	                    <label>Senha</label>
	                    <input type="password" name="password">
	                </div>
                    <div>
                        <button type="submit">Entrar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection