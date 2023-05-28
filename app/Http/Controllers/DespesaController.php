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


    public function store(Request $request) {
      
        Despesa::create([
            'nome' => $request->input('nome'),
            'valor' => $request->input('valor'),
            'pagamento' => $request->input('pagamento')
        ]);

        echo 'Registrado com succeso';
    }
}
