<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ItemPedidoCompra extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'pedido_compra_id',
        'produto_id',
        'quantidade',
        'preco_unitario'
    ];

    public function pedidoCompra()
    {
        return $this->belongsTo(PedidoCompra::class);
    }

    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }
}