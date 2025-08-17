<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PedidoCompra extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'fornecedor_id',
        'nota_fiscal',
        'valor_total',
        'status',
        'data_pedido',
        'data_entrega'
    ];

    public function itens()
    {
        return $this->hasMany(ItemPedidoCompra::class, 'pedido_compra_id', 'id');
    }

    public function fornecedor()
    {
        return $this->belongsTo(Fornecedor::class, 'fornecedor_id', 'id');
    }
}
