<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Despesa extends Model
{

    protected $fillable = [
        'nome',
        'valor',
        'user_id',
        'pagamento',
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }


    use HasFactory;
}
