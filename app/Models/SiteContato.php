<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteContato extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'email',
        'telefone',
        'mensagem',
        'motivo_id',
    ];

    public function motivo()
    {
        return $this->belongsTo(ContatoMotivo::class, 'motivo_id');
    }
}
