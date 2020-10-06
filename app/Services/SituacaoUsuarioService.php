<?php

namespace App\Services;


use App\Repositories\SituacaoUsuarioRepository;

class SituacaoUsuarioService extends AbstractService
{

    /**
     * @var SituacaoUsuarioRepository
     */
    protected $repository;

    /**
     * AvaService constructor.
     * @param SituacaoUsuarioRepository $repository
     */
    public function __construct(SituacaoUsuarioRepository $repository)
    {
        $this->repository = $repository;
    }

}
