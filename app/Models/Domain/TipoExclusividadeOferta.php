<?php

namespace App\Models\Domain;

use App\Models\AbstractModel;

class TipoExclusividadeOferta extends AbstractModel
{
    protected $table        = 'tb_tipo_exclusividade_oferta';
    protected $primaryKey   = 'id_tipo_exclusividade_oferta';

    protected $fillable = [
        'tx_nome_tipo_exclusividade_oferta',
        'tx_descricao_tipo_exclusividade_oferta'
    ];

}
