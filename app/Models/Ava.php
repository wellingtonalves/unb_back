<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ava extends AbstractModel
{
    use SoftDeletes;
    
    protected $table = 'tb_ava';
    protected $primaryKey = 'id_ava';

    protected $fillable = [
        'id_orgao',
        'tx_url',
        'tp_situacao_ava',
        'tp_operacional',
        'tx_token',
        'tx_nome_ava',
        'tp_ava',
    ];
}
