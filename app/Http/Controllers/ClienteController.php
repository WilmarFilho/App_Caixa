<?php

namespace App\Http\Controllers;
use App\Models\Cliente;
use App\Models\Venda;
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

    public function edit(Request $request) {
        
        Cliente::where('id', $request->input('cliente'))->where('user_id', auth()->user()->id)->update([
            'user_id' =>  auth()->user()->id,
            'nome' => $request->input('nome'),
            'nome_comercial' => $request->input('nome_comercial'),
            'estado' => $request->input('estado'),
            'cidade' => $request->input('cidade'),
            'endereco' => $request->input('endereco'),
            'numero' => $request->input('numero'),
            'saldo' => $request->input('saldo'),
        ]);

        $msg = 'Cliente atualizado com sucesso';

        return redirect()->route('cliente.show', ['cliente' => $request->input('cliente'), 'msg' => $msg]);

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

    public function show(cliente $cliente) {

        $vendas = venda::where('cliente', $cliente->id)->where('user_id', auth()->user()->id)->get();

        $dadosCliente = Cliente::where('id', $cliente->id)->where('user_id', auth()->user()->id)->get();
        
        return view('indexCliente', ['cliente' => $dadosCliente[0], 'vendas' => $vendas]);
    }

    public function showCustom(Request $request) {

        $vendas = venda::where('cliente', $request->input('id-cliente'))->where('user_id', auth()->user()->id)->get();

        $dadosCliente = Cliente::where('id', $request->input('id-cliente'))->where('user_id', auth()->user()->id)->get();
        
        return view('indexCliente', ['cliente' => $dadosCliente[0], 'vendas' => $vendas]);
    }

    public function quitaVenda($cliente, $venda, $valor) {

        $dadosCliente = Cliente::where('id', $cliente)->where('user_id', auth()->user()->id)->get();

        $saldoAntigo = $dadosCliente[0]->saldo;
        $saldoNovo = $saldoAntigo - $valor;

        Cliente::where('id', $cliente)->where('user_id', auth()->user()->id)->update(['saldo' => $saldoNovo]);

        venda::where('id', $venda)->where('user_id', auth()->user()->id)->update(['pagamento' => 'A vista']);
        
        return redirect()->route('cliente.show', ['cliente' => $cliente]);
    }
}






