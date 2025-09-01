<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SiteComponente extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'site_componentes';

    protected $fillable = [
        'tipo',
        'titulo',
        'valor',
        'descricao',
        'descricao_html',
        'icone',
        'cor',
        'url',
        'id_referencia',
        'ordem',
    ];
}
