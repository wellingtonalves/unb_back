<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Relations\HasMany;

class Pais extends AbstractModel
{
    protected $table        = 'tb_pais';
    protected $primaryKey   = 'sg_pais';
    public $incrementing = false;

    protected $fillable = [
        'sg_pais',
        'tx_nome_pais'
    ];

    public function pessoa(): HasMany
    {
        return $this->hasMany(Pessoa::class, 'sg_pais');
    }

}
