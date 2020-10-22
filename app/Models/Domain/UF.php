<?php

namespace App\Models\Domain;

use App\Models\AbstractModel;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UF extends AbstractModel
{
    protected   $table          = 'tb_unidade_federacao';
    protected   $primaryKey     = 'sg_uf';
    public      $incrementing   = false;

    protected $fillable = [
        'sg_uf',
        'tx_nome_uf'
    ];

    public function municipio(): HasMany
    {
        return $this->hasMany(Municipio::class, 'sg_uf');
    }

}
