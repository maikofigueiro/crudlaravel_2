<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/**

	AUTOGESTOR

**/
/**
LOGIN
**/
Route::get('/', 'UserController@login');
Route::get('login', 'UserController@login');
Route::get('login/sair', 'UserController@sair');
Route::get('home', 'UserController@home');

Route::post('login', 'UserController@entrar');
/**
ACESSO ADMIN
**/
Route::get('novo-usuario', 'UserController@novoUsuario');
Route::get('novo-perfil', 'UserController@novoPerfil');
Route::get('lista-usuario', 'UserController@listaUsuario');
Route::get('lista-perfil', 'UserController@listaPerfil');
Route::get('editar/perfil/{id}', 'UserController@editarPerfil');
Route::get('editar/usuario/{id}', 'UserController@editarUsuario');

Route::post('excluir-usuario', 'UserController@excluirUsuario');
Route::post('excluir-perfil', 'UserController@excluirPerfil');
Route::post('novo-usuario', 'UserController@doNovoUsuario');
Route::post('novo-perfil', 'UserController@doNovoPerfil');
Route::post('editar-usuario', 'UserController@doEditarUsuario');
Route::post('editar-perfil', 'UserController@doEditarPerfil');
/**
PRODUTOS
**/
Route::get('produtos', 'ProdutoController@produto');

/**
CATEGORIAS
**/
Route::get('categorias', 'CategoriaController@categoria');

/**
MARCAS
**/
Route::get('marcas', 'MarcaController@marcas');