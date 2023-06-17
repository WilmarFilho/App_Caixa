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

    public function index() {
        echo('a');
    }

    public function consulta(Request $request) {
        echo('b');
    }
}
