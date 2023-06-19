<?php

namespace App\Http\Controllers;
use App\Models\Despesa;
use App\Models\Venda;
use Illuminate\Http\Request;

class CaixaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request) {

        $condicao = $request->dia . '%';

        $vendas = venda::where('created_at', 'like', $condicao)->get();
        $despesas = despesa::where('created_at', 'like', $condicao)->get();

        return view('home', ['vendas' => $vendas, 'despesas' => $despesas]);
    }

    public function consulta(Request $request) {
        
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

        $vendas = venda::where('created_at', '>', $condicao1)->where('created_at', '<', $condicao2)->get();
        $despesas = despesa::where('created_at', '>', $condicao1)->where('created_at', '<', $condicao2)->get();

        return view('home', ['vendas' => $vendas, 'despesas' => $despesas]);
        

    }
}
