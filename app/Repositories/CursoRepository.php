<?php

namespace App\Repositories;

use App\Models\Curso;

class CursoRepository extends AbstractRepository
{
    /**
     * Relationships
     *
     * @return string
     */
    public $relationships = [
        'tematicaCurso'
    ];

    /**
     * FieldSearchable
     *
     * @return string
     */
    protected $fieldSearchable = [
        'id_legado_curso',
        'id_tematica_curso',
        'qt_carga_horaria_minima',
        'tx_nome_curso' => 'ilike',
        'tp_situacao_curso',
        'tx_conteudo_programatico',
        'tx_apresentacao',
        'tx_url_imagem_curso',
        'tx_url_video_curso',
        'bl_destaque_curso',
        'nr_ordem_curso',
        'tp_origem_curso',
        'created_at'
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Curso::class;
    }
}
