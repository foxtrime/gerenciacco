<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;



class UserController extends Controller

{
	
	public function index()
	{
		$usuarios = User::with('usersetores')->get();
		// $usuario_logado  = Auth::user();
		// dd($usuarios);

		$setores_usuario_logado = [];
		
		$checa_setor = Auth::user()->usersetores;
		// dd($checa_setor);
		foreach($checa_setor as $setor){
			$a = $setor->nome_setor;
			array_push($setores_usuario_logado,$a);
		}
		
		
		// dd($setores_usuario_logado);


		return view('usuario.index',compact('usuarios','setores_usuario_logado'));
	}

	public function create()
	{
		return view('usuario.create');
	}

	public function store(Request $request)
	{
		// dd($request->all());

		$user = new User;
		
		$user->name 	= $request->name;
		$user->email 	= $request->email;
		$user->nivel 	= $request->nivel;
		$senha_gerada  = 'pmm123456';
		$user->password =  bcrypt($senha_gerada);

		$user->save();

		return redirect()->to('user');
	}
	
	public function AlteraSenha()
	{
		$usuario = Auth::user();
	
		return view('auth.altera_senha',compact('usuario'));    
	}

	public function SalvarSenha(Request $request)
	{
		
		// Validar
		$this->validate($request, [
			'password_atual'        => 'required',
			'password'              => 'required|min:6|confirmed',
			'password_confirmation' => 'required|min:6'
		]);

		// Obter o usuário
		$usuario = User::find(Auth::user()->id);

		if (Hash::check($request->password_atual, $usuario->password))
		{

			$usuario->update(['password' => bcrypt($request->password)]);            

			Auth::login($usuario);
			return back()->with('sucesso','Senha alterada com sucesso.');
		}else{
			return back()->withErrors('Senha atual não confere.');
		}

	}

	public function destroy($id)
	{
		$user = User::find($id);

		$user->delete();


	}


}