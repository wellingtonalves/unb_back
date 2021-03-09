<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;

class TematicaCurso extends AbstractModel
{
    protected $table = 'tb_tematica_curso';
    protected $primaryKey = 'id_tematica_curso';

    protected $fillable = [
        'tx_nome_tematica_curso',
        'tx_paleta_de_cores',
        'tx_url_imagem_personagem',
        'tx_url_imagem_bg',
        'tx_apresentacao'
    ];

    public function curso(): HasMany
    {
        return $this->hasMany(Curso::class, 'id_tematica_curso', 'id_tematica_curso');
    }
}
