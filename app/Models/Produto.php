<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produto extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nome',
        'descricao',
        'imagem',
        'status'
    ];

    public function detalhes()
    {
        return $this->hasOne(ProdutoDetalhe::class, 'produto_id', 'id');
    }

    public function produtoFiliais()
    {
        return $this->hasMany(ProdutoFilial::class, 'produto_id', 'id');
    }

    public function itemPedidoCompras()
    {
        return $this->hasMany(ItemPedidoCompra::class, 'produto_id', 'id');
    }

    public function itemPedidoVendas()
    {
        return $this->hasMany(ItemPedidoVenda::class, 'produto_id', 'id');
    }

    public function produtoCategorias()
    {
        return $this->hasMany(ProdutoCategoria::class, 'produto_id', 'id');
    }
}
