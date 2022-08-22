<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form_Label_Setor;
use App\Models\Labels_Checkbox_Options_Form;
use Auth;

class FormularioController extends Controller
{
    public function configindex()
    {
        $setores_usuario_logado = [];
		
		$checa_setor = Auth::user()->usersetores;

		foreach($checa_setor as $setor){
			$a = $setor->nome_setor;
			array_push($setores_usuario_logado,$a);
		}


        $forms_labels = Form_Label_Setor::with('user')->whereIn('nome_setor', $setores_usuario_logado)->get();

        return view('formconfig.index', compact('forms_labels'));
    }

    public function configcreate()
    {
		$setores_usuario_logado = [];
		
		$checa_setor = Auth::user()->usersetores;
		// dd($checa_setor);
		foreach($checa_setor as $setor){
			$a = $setor->nome_setor;
			array_push($setores_usuario_logado,$a);
		}

        return view('formconfig.createconfig', compact('setores_usuario_logado'));
    }

    public function configsave(Request $request)
    {   
        $forms_labels = new Form_Label_Setor;

        if($request->tipo != 'checkbox'){
            
            $forms_labels->nome           = $request->nome;
            $forms_labels->tipo           = $request->tipo;
            $forms_labels->is_required    = $request->is_required;
            $forms_labels->user_id        = Auth::user()->id;
            $forms_labels->nome_setor     = $request->nome_setor;

            $forms_labels->save();
        }else{
        //    dd($request->all());
           $forms_labels->nome           = $request->nome;
           $forms_labels->tipo           = $request->tipo;
           $forms_labels->is_required    = $request->is_required;
           $forms_labels->user_id        = Auth::user()->id;
           $forms_labels->nome_setor     = $request->nome_setor;

           $forms_labels->save();

           foreach($request->checkboxvalue as $nome){
                Labels_Checkbox_Options_Form::create([
                    'form_label_setor_id' => $forms_labels->id,
                    'nome'     => $nome
                ]);
           }

        }

        return redirect()->to('configforms');
    }
}
