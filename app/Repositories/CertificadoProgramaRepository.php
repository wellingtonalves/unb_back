<?php

namespace App\Repositories;

use App\Models\CertificadoPrograma;

class CertificadoProgramaRepository extends AbstractRepository
{
    /**
     * Relationships
     *
     * @return string
     */
    public $relationships = [
        'inscricao.oferta.curso'
    ];

    /**
     * FieldSearchable
     *
     * @return string
     */
    protected $fieldSearchable = [
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return CertificadoPrograma::class;
    }
}
