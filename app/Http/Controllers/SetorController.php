<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setores;

class SetorController extends Controller
{
    public function index()
    {
        $setores = Setores::all();

        return view('setores.index', compact('setores'));
    }

    public function create()
    {
        return view('setores.create');
    }

    public function store(Request $request)
    {

        $setor = new Setores;

        $setor->nome_setor = $request->nome_setor;

        $setor->save();

        return redirect()->to('setores');
    }
}
