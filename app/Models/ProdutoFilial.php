<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProdutoFilial extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'produto_filiais';

    protected $fillable = [
        'id',
        'produto_id',
        'filial_id',
        'preco_venda', // preco recomendado para venda
        'estoque_minimo', // quantidade minima em estoque
        'estoque_maximo', // quantidade maxima em estoque
        'estoque_atual' // quantidade atual em estoque
    ];

    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }

    public function filial()
    {
        return $this->belongsTo(Filial::class);
    }
}
