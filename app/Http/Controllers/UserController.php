<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Perfil;

class UserController extends Controller
{
    public function login()
    {
    	if(!Auth::check()) {
    		return view('login');
		} else {
			return redirect("home");
		}
    }

    public function entrar(Request $request)
    {
    	$email = $request->email;
		$password = $request->password;
		if (Auth::attempt(['email' => $email, 'password' => $password])) {
			return redirect("home");
		}else{
			return redirect('login?error=1');
		}
    }

    public function sair() {
		Auth::logout();
		return redirect('login');
	}

	public function home()
	{
		$dados['perfil'] = User::find(Auth::user()->id);
		return view('index', $dados);
	}

	public function novoPerfil()
	{
		return view('form-novo-perfil');
	}

	public function novoUsuario()
	{
		$dados = Perfil::select('id', 'titulo')->get();
        foreach ($dados as $key => $value) {
            if(!empty($value)){
                $perfil[$value['id']] = $value['titulo'];
            }
        }
        $dados['perfil'] = $perfil;
 		return view('form-novo-usuario', $dados);
	}

	public function doNovoUsuario(Request $request)
	{
		if ($request) {
			$user = new User;
			$perfil = new Perfil;
			$user->nome = $request->nome;
			$user->email = $request->email;
			$user->password = bcrypt($request->password);
			$user->save();
			if ($user->id) {
				foreach ($request->perfil as $key) {
					$perfil = Perfil::find($key);
					$user->perfil()->attach($perfil->id);
				}
			}
		}

		$resposta["sucesso"] = "Usuario cadastrado com sucesso!";
		$resposta["callback"] = "/home";
		return $resposta;
	}

	public function doNovoPerfil(Request $request)
	{
		if ($request) {
			$perfil = new Perfil;

			$perfil->titulo = $request->titulo;
			$perfil->save();
		}

		$resposta["sucesso"] = "Perfil cadastrado com sucesso!";
		$resposta["callback"] = "/home";
		return $resposta;
	}

	public function listaPerfil()
	{
		$dados['perfis'] = Perfil::all();
		return view('lista-perfil', $dados);
	}

	public function listaUsuario()
	{
        $dados['users'] = User::all();
 		return view('lista-usuario', $dados);
	}

	public function editarPerfil(Perfil $id)
	{
		$dados["perfil"] = $id;
		return view('editar-perfil', $dados);
	}

	public function editarUsuario(User $id)
	{
		$dados = Perfil::select('id', 'titulo')->get();
        foreach ($dados as $key => $value) {
            if(!empty($value)){
                $perfil[$value['id']] = $value['titulo'];
            }
        }
        $dados['perfil'] = $perfil;
        $dados["usuario"] = $id;
        return view('editar-usuario', $dados);
	}

	public function doEditarUsuario(Request $request)
	{
		if ($request) {
			$user = User::find($request->id);
			$user->nome = $request->nome;
			$user->email = $request->email;
			if($request->password){
				$user->password = bcrypt($request->password);
			}
			$user->save();
			if ($user->id && $request->perfil) {
				foreach ($request->perfil as $key) {
					$perfil = Perfil::find($key);
					$user->perfil()->sync([$perfil->id]);
				}
			}
		}

		$resposta["sucesso"] = "Perfil alterado com sucesso!";
		$resposta["callback"] = "/home";
		return $resposta;
	}

	public function doEditarPerfil(Request $request)
	{
		if ($request) {
			$perfil = Perfil::find($request->id);

			$perfil->titulo = $request->titulo;
			$perfil->save();
		}

		$resposta["sucesso"] = "Perfil alterado com sucesso!";
		$resposta["callback"] = "/home";
		return $resposta;
	}

	public function excluirPerfil(Request $request)
	{
		$perfil = Perfil::find($request->id);
		$perfil->delete();

		$resposta["sucesso"] = "Perfil excluido com sucesso!";
		$resposta["callback"] = "/lista-perfil";
		return $resposta;
	}

	public function excluirUsuario(Request $request)
	{
		$user = User::find($request->id);

		foreach ($user->perfil as $key) {
			$perfil = Perfil::find($key);
			$user->perfil()->detach();
		}
		$user->delete();

		$resposta["sucesso"] = "Usuario excluido com sucesso!";
		$resposta["callback"] = "/lista-usuario";
		return $resposta;
	}
}
