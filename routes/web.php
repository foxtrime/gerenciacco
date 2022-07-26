<?php

Route::get ('/', 			"AuthController@login")->name('login');
Route::get ("/login", 		"AuthController@login")->name('login');
Route::post('/login', 		"AuthController@entrar");
Route::get ('/logout', 		'AuthController@logout')->name('logout');

Route::group(['middleware' => ['auth']], function () {

	Route::get ('/alterasenha',					'UserController@AlteraSenha');
	Route::post('/salvasenha',   				'UserController@SalvarSenha');
	Route::post('/enviarsenhausuario',			'UserController@EnviarSenhaUsuario');
	Route::post('/zerarsenhausuario',   		'UserController@ZerarSenhaUsuario');
	// Route::get ('/', 							'HomeController@index')->name('home');
	Route::get('/home', 'HomeController@index')->name('home');

	
	
	Route::get('configforms',			'FormularioController@configindex')->name('configforms');
	Route::get('configform/create',	'FormularioController@configcreate');
	Route::post('configform/save',		'FormularioController@configsave');


	Route::resource('user',			'UserController');
	Route::resource('setores',		'SetorController');
	Route::resource('unidades',		'UnidadeController');
});