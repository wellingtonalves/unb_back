<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;

class Orgao extends AbstractModel
{
    protected $table = 'tb_orgao';
    protected $primaryKey = 'id_orgao';

    protected $fillable = [
        'id_responsavel_legal',
        'tx_nome_orgao',
        'nr_cnpj',
        'id_vinculo',
        'id_esfera',
        'bl_status_orgao',
        'tx_sigla_orgao',
        'tx_url_imagem_orgao',
        'bl_instituicao_parceira',
        'tx_link_orgao',
    ];
}
