<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;

class Parceiro extends AbstractModel
{

    protected $table = 'tb_parceiros';
    protected $primaryKey = 'id_parceiros';

    protected $fillable = [
        'tx_nome_parceiros',
        'tx_logo_parceiros',
        'tx_link_parceiros'
    ];

    public function exclusividade(): HasMany
    {
        return $this->hasMany(ExclusividadeOferta::class, 'id_orgao_parceiro', 'id_parceiros');
    }
}
