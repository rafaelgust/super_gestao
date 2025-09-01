<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProdutoCategoria extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['produto_id', 'categoria_id'];

    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}
