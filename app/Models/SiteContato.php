<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

    public function select()
    {
        return DB::select("
        SELECT site.nome, site.mensagem, site.email, site.telefone, motivo.motivo
            FROM site_contatos site
            INNER JOIN contato_motivos motivo ON motivo.id = site.motivo_id
            ");


    }
}
