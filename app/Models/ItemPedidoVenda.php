<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ItemPedidoVenda extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'pedido_venda_id',
        'produto_id',
        'quantidade',
        'preco_unitario'
    ];

    public function pedidoVenda()
    {
        return $this->belongsTo(PedidoVenda::class);
    }

    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }
}
