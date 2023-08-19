<?php

namespace App\Http\Controllers;
use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        return view('produtos');;
    }

    public function ajax($input, $user)
    {

        $valor = '%' . $input . '%';
        $produto = Produto::where('nome', 'like', $valor)->where('user_id', $user)->get();

        
        $resultado['nome'] = $produto[0]->nome;
        $resultado['id'] = $produto[0]->id;
        $resultado['preço'] = $produto[0]->preço;
        $resultado['preço_c'] = $produto[0]->preço_c;
        

        return $resultado;
    }

    public function ajax2($input, $user)
    {

        $produto = Produto::where('id', $input)->where('user_id', $user)->get();

        $resultado['nome'] = $produto[0]->nome;
        $resultado['preço'] = $produto[0]->preço;
        
        return $resultado;
    }


    public function store(Request $request) {
      
        Produto::create([
            'user_id' =>  auth()->user()->id,
            'nome' => $request->input('nome'),
            'preço_c' => $request->input('precoc'),
            'preço' => $request->input('preco'),
            'tipo' => $request->input('tipo')
        ]);

        $msg = 'Produto registrado com sucesso';

        return redirect()->route('produto.index', ['msg' => $msg]);

    }
}
