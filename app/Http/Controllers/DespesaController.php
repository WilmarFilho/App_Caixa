<?php

namespace App\Http\Controllers;
use App\Models\Despesa;
use Illuminate\Http\Request;

class DespesaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('despesas');;
    }

    public function create(Request $request)
    {

        switch($request->mes) {

            case 'Janeiro':
                $condicao1 = '2023-01-01 00:00:00';
                $condicao2 = '2023-02-01 00:00:00';
                break;
            case 'Fevereiro':
                $condicao1 = '2023-02-01 00:00:00';
                $condicao2 = '2023-03-01 00:00:00';
                break;
            case 'Março':
                $condicao1 = '2023-03-01 00:00:00';
                $condicao2 = '2023-04-01 00:00:00';
                break;
            case 'Abril':
                $condicao1 = '2023-04-01 00:00:00';
                $condicao2 = '2023-05-01 00:00:00';
                break;
            case 'Maio':
                $condicao1 = '2023-05-01 00:00:00';
                $condicao2 = '2023-06-01 00:00:00';
                break;
            case 'Junho':
                $condicao1 = '2023-06-01 00:00:00';
                $condicao2 = '2023-07-01 00:00:00';
                break;
            case 'Julho':
                $condicao1 = '2023-07-01 00:00:00';
                $condicao2 = '2023-08-01 00:00:00';
                break;
            case 'Agosto':
                $condicao1 = '2023-08-01 00:00:00';
                $condicao2 = '2023-09-01 00:00:00';
                break;
            case 'Setembro':
                $condicao1 = '2023-09-01 00:00:00';
                $condicao2 = '2023-10-01 00:00:00';
                break;
            case 'Outubro':
                $condicao1 = '2023-10-01 00:00:00';
                $condicao2 = '2023-11-01 00:00:00';
                break;
            case 'Novembro':
                $condicao1 = '2023-11-01 00:00:00';
                $condicao2 = '2023-12-01 00:00:00';
                break;
            case 'Dezembro':
                $condicao1 = '2023-12-01 00:00:00';
                $condicao2 = '2023-13-01 00:00:00';
                break;
        }

        $despesas = despesa::where('created_at', '>', $condicao1)->where('created_at', '<', $condicao2)->where('user_id', auth()->user()->id)->get(); 

        if(isset($request->dia)) {

            $condicao3 = $request->dia . '%';

            $despesas = despesa::where('created_at', 'like', $condicao3)->where('user_id', auth()->user()->id)->get();
        }

        return view('despesas', ['despesas' => $despesas]);
    }

    public function store(Request $request) {
      
        Despesa::create([
            'user_id' =>  auth()->user()->id,
            'nome' => $request->input('nome'),
            'valor' => $request->input('valor'),
            'pagamento' => $request->input('pagamento')
        ]);

        $msg = 'Despesa registrada com sucesso';

        return view('despesas', ['msg' => $msg]);

    }
}
