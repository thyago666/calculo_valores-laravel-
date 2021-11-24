<?php

namespace App\Http\Controllers;

use App\Models\Ingrediente;

use Illuminate\Http\Request;

class ingredienteController extends Controller
{
    public function index(){

       $ingredientes = Ingrediente::orderBy('descricao')->get();
      return view('viewIngrediente',compact('ingredientes'));

      

    }


    public function create(){
     return view('cadIngredienteView');

    }

    public function update($id, Request $request){

        $ingredientes=Ingrediente::find($id);
        $ingredientes->descricao = $request->descricao;
        $ingredientes->unidMedida = $request->unidade_medida;
        $ingredientes->save();

    }

    public function edit($id){

        $ingredientes=Ingrediente::where('id',$id)->first();

        return view('editIngredienteView',compact('ingredientes'));

    }

    public function insert(Request $request){

        $verifica = Ingrediente::where('descricao',$request->descricao)->get();
      
        if($verifica->count()){
         return 'Ingrediente já cadastrado';
        }

        else
        {
     $dados = new Ingrediente([

            'descricao'=>$request->descricao,
            'unidMedida'=>$request->unidade_medida,
            'valor'=>'0.00'
        ]);
            $dados->save();
     $ingredientes = Ingrediente::all();
     return view('viewIngrediente',compact('ingredientes'));
      

     
    }
}
}
