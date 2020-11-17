<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ValorExclusividadeOferta extends AbstractModel
{
    protected $table = 'tb_valor_exclusividade_oferta';
    protected $primaryKey = 'id_valor_exclusividade_oferta';

    protected $fillable = [
        'id_exclusividade_oferta',
        'valor_exclusividade',
        'entidade'
    ];

    public function exclusividade(): BelongsTo
    {
        return $this->belongsTo(ExclusividadeOferta::class, 'id_exclusividade_oferta', 'id_exclusividade_oferta');
    }
}
