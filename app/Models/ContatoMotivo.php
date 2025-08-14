<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContatoMotivo extends Model
{
    use HasFactory;

    protected $fillable = [
        'motivo',
    ];

    public function contatos()
    {
        return $this->hasMany(SiteContato::class, 'motivo_id');
    }
}
