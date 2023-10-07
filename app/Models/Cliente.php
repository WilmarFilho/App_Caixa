<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{

    protected $fillable = [
        'nome',
        'nome_comercial',
        'user_id',
        'preço_c',
        'endereco',
        'cidade',
        'estado',
        'saldo',
        'numero',
        'img'
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    use HasFactory;
}
