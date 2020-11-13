<?php

namespace App\Repositories;

use App\Models\Oferta;

class OfertaRepository extends AbstractRepository
{
    /**
     * Relationships
     *
     * @return string
     */
    public $relationships = [
        'tipoOferta',
        'exclusividade'
    ];

    /**
     * FieldSearchable
     *
     * @return string
     */
    protected $fieldSearchable = [
        'tx_nome_oferta' => 'ilike',
        'id_tipo_oferta',
        'id_ava',
        'tp_situacao_oferta',
        'id_curso',
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Oferta::class;
    }

}
