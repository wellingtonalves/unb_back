<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ava extends AbstractModel
{
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

    /**
     * Orgao
     *
     * @return BelongsTo
     */
    public function orgao(): BelongsTo
    {
        return $this->belongsTo(Orgao::class, 'id_orgao');
    }
}
