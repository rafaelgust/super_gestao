<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    use HasFactory;
    protected $table = 'fornecedores';

    protected $fillable = ['nome', 'cnpj', 'email', 'telefone'];

    public function pedidoCompras()
    {
        return $this->hasMany(PedidoCompra::class, 'fornecedor_id', 'id');
    }

}
