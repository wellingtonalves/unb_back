<?php

namespace App\Repositories;

use App\Models\Pessoa;

class PessoaRepository extends AbstractRepository
{
    /**
     * Relationships (with)
     * @var array
     */
    public $relationships = [
        'usuario',
    ];

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'tx_nome_pessoa',
        'tx_nome_social',
        'tp_sexo',
        'nr_passaporte',
        'tx_email_pessoa',
        'tx_email_institucional',
        'nr_cpf',
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Pessoa::class;
    }
}
