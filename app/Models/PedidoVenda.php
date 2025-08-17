<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PedidoVenda extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'cliente_id',
        'nota_fiscal',
        'valor_total',
        'status',
        'data_pedido',
        'data_entrega'
    ];

    public function itens()
    {
        return $this->hasMany(ItemPedidoVenda::class, 'pedido_venda_id', 'id');
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id', 'id');
    }
}
