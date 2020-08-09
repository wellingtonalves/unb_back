<?php

namespace App\Repositories;

use App\Models\TematicaCurso;

class TematicaCursoRepository extends AbstractRepository
{
    /**
     * Relationships
     *
     * @return string
     */
    public $relationships = [];

    /**
     * FieldSearchable
     *
     * @return string
     */
    protected $fieldSearchable = [
        'tx_nome_tematica_curso',
        'tx_paleta_de_cores',
        'tx_url_imagem_personagem',
        'tx_url_imagem_bg',
        'tx_apresentacao'
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return TematicaCurso::class;
    }
}
