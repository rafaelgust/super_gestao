<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SiteCliente extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'site_cliente';

    protected $fillable = [
        'nome',
        'descricao',
        'descricao_area',
        'descricao_html',
        'telefone_contato',
        'whatsapp_contato',
        'email_contato',
    ];
}
