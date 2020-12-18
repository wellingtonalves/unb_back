<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InscricaoPrograma extends AbstractModel
{
    protected $table = 'tb_inscricao_programa';
    protected $primaryKey = 'id_inscricao_programa';

    /**
     * @return BelongsTo
     */
    public function pessoa(): BelongsTo
    {
        return $this->belongsTo(Pessoa::class, 'id_pessoa', 'id_pessoa');
    }

    /**
     * @return BelongsTo
     */
    public function programa(): BelongsTo
    {
        return $this->belongsTo(Programa::class, 'id_programa', 'id_programa');
    }
}
