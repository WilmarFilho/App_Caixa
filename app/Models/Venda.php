<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Produto;
use App\Models\Cliente;
use App\Models\User;

class Venda extends Model
{

    protected $fillable = [
        'nome',
        'user_id',
        'valor',
        'cliente_id',
        'pagamento',
        'produto_id',
        'qtd',
        'desconto'
    ];

    public function Produto()
    {
        return $this->belongsTo(Produto::class);
    }

    public function Cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    
    use HasFactory;
}
