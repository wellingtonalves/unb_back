<?php

namespace App\Models\Domain;

use App\Models\AbstractModel;
use App\Models\ExclusividadeOferta;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TipoExclusividadeOferta extends AbstractModel
{
    protected $table        = 'tb_tipo_exclusividade_oferta';
    protected $primaryKey   = 'id_tipo_exclusividade_oferta';

    protected $fillable = [
        'tx_nome_tipo_exclusividade_oferta',
        'tx_descricao_tipo_exclusividade_oferta'
    ];

    public function exclusividade(): HasMany
    {
        return $this->hasMany(ExclusividadeOferta::class, 'id_tipo_exclusividade_oferta', 'id_tipo_exclusividade_oferta');
    }
}
