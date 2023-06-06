<?php

namespace App\Http\Controllers;
use App\Models\Venda;
use Illuminate\Http\Request;

class VendaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function store(Request $request) {
      
        venda::create([
            'nome' => $request->input('nome'),
            'valor' => $request->input('valor'),
            'pagamento' => $request->input('pagamento')
        ]);

        $msg = 'Venda registrada com sucesso';

        return redirect()->route('home', ['msg' => $msg]);

    }
}
