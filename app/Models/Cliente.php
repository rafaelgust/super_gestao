<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

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

    
    public function select()
    {
        return DB::select("
            SELECT * FROM clientes
        ");
    }
}
