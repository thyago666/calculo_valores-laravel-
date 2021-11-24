<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class produtoController extends Controller
{
    public function index(){

        $produtos = Produto::orderBy('descricao')->get();

        return view('produtosView',compact('produtos'));

    }

    public function create(){

        return view('cadProdutos');

    }

    public function insert(Request $request){

        $dados = new Produto([

            'descricao'=>$request->descricao,
            'tipo'=>$request->tipo,
        ]);
            $dados->save();

            $produtos = Produto::all();
            return view('produtosView',compact('produtos'));
    }
}
