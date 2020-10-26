<?php

namespace App\Models\Domain;

use App\Models\AbstractModel;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Municipio extends AbstractModel
{
    protected $table        = 'tb_municipio';
    protected $primaryKey   = 'id_municipio';
    public $incrementing = false;

    protected $fillable = [
        'sg_pais',
        'tx_nome_municipio'
    ];

    public function pessoa(): HasMany
    {
        return $this->hasMany(Pessoa::class, 'sg_pais');
    }

}
