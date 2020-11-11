<?php

namespace App\Repositories;

use App\Models\View\VwEmissaoCertificado;

class VwEmissaoCertificadoRepository extends AbstractRepository
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
        'id_certificado',
        'tx_origem'
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return VwEmissaoCertificado::class;
    }

}
