<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class AvaliacaoInscrito extends AbstractModel
{

    protected $table = 'tb_avaliacao_inscrito';

    /**
     * Avaliacao
     *
     * @return BelongsTo
     */
    public function avaliacao(): BelongsTo
    {
        return $this->belongsTo(Avaliacao::class, 'id_avaliacao');
    }
}
