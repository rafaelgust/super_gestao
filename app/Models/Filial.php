<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Filial extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'filiais';

    protected $fillable = [
        'nome'
    ];

    public function produtos()
    {
        return $this->hasMany(ProdutoFilial::class, 'filial_id', 'id');
    }
}
