<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Produto extends Model
{

    protected $fillable = [
        'nome',
        'preço',
        'user_id',
        'preço_c',
        'tipo'
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    use HasFactory;
}
