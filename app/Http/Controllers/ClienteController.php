<?php

namespace App\Http\Controllers;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        return view('clientes');;
    }

    public function store(Request $request) {
      
        Cliente::create([
            'user_id' =>  auth()->user()->id,
            'nome' => $request->input('nome'),
            'nome_comercial' => $request->input('nome_comercial'),
            'estado' => $request->input('estado'),
            'cidade' => $request->input('cidade'),
            'endereco' => $request->input('endereco'),
            'numero' => $request->input('numero'),
            'saldo' => $request->input('saldo'),
        ]);

        $msg = 'Cliente registrado com sucesso';

        return redirect()->route('cliente.index', ['msg' => $msg]);

    }


    public function ajaxCliente($input, $user)
    {

        $valor = '%' . $input . '%';
        $produto = Cliente::where('nome', 'like', $valor)->where('user_id', $user)->get();

        
        $resultado['nome'] = $produto[0]->nome;
        $resultado['nome_comercial'] = $produto[0]->nome_comercial;
        $resultado['cidade'] = $produto[0]->cidade;
        $resultado['id'] = $produto[0]->id;
        

        return $resultado;
    }

    public function ConsultaEstado(Request $request) {
        $clientes = Cliente::where('estado', $request->input('estado'))->where('user_id', $request->input('user_id'))->orderBy('nome', 'ASC')->get();
        return view('clientes', ['clientes' => $clientes]);
    }
}
