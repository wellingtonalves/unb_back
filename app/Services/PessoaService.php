<?php

namespace App\Services;

use App\Repositories\PessoaRepository;

class PessoaService extends AbstractService
{

    /**
     * @var PessoaRepository
     */
    protected $repository;

    /**
     * CursoService constructor.
     * @param PessoaRepository $repository
     */
    public function __construct(PessoaRepository $repository)
    {
        $this->repository = $repository;
    }
}
