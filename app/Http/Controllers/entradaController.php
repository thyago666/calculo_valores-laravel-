<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ingrediente;
use App\Models\Entrada;
use DB;


class entradaController extends Controller
{
    public function index(){
      $ingredientes = Ingrediente::orderBy('descricao')->get();
       return view('cadEntradaIngredienteView',compact('ingredientes'));
   }

    public function pesquisa(Request $request){
        $ingredientes = Ingrediente::orderBy('descricao')->get();
         $data_inicial = $request->dt_inicial;
         $data_final = $request->dt_final;
        
        $psq = DB::select("SELECT ent.valor_total as valor,
        ent.created_at as data_compra, ing.descricao as descricao, ing.id as id
         FROM ingredientes ing, entrada ent 
        WHERE ent.id_ingrediente = ing.id AND DATE(ent.created_at) BETWEEN '$data_inicial' 
        AND '$data_final' ORDER BY 'ing.descricao' ");

        return view('cadEntradaIngredienteView',compact('psq','ingredientes'));
        

        
    }

    public function insert(Request $request){

        $dados = new Entrada([

            'id_ingrediente'=>$request->ingrediente,
            'qtd'=>$request->qtd,
            'valor_total'=>$request->valor_total,
        ]);
            $dados->save();

            $ingredientes=Ingrediente::find($request->ingrediente);

//atualizando valor da tgabela ingredientes

            if($request->unid_medida == 'gr' || $request->unid_medida == 'kg'){

                $atual = ($request->valor_total*1000)/$request->qtd;

            }elseif($request->unid_medida == 'un'){
                $atual = ($request->valor_total/$request->qtd);

            }elseif($request->unid_medida == 'po'){
                $atual = ($request->valor_total*$request->qtd);

            }
        

         

        $ingredientes->valor = $atual;
          $ingredientes->save();
          return view("welcome");
   


    }
}
