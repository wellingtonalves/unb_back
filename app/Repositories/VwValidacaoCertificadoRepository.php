<?php

namespace App\Repositories;

use App\Models\View\VwValidacaoCertificado;

class VwValidacaoCertificadoRepository extends AbstractRepository
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
        'codigo_certificado'
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return VwValidacaoCertificado::class;
    }

}
