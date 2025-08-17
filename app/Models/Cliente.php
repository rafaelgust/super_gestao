<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nome',
        'cpf',
        'telefone',
        'email',
    ];

    public function pedidosVenda()
    {
        return $this->hasMany(PedidoVenda::class, 'cliente_id', 'id');
    }
}
