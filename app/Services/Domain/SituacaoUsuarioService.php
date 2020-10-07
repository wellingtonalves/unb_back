<?php

namespace App\Services\Domain;

use App\Services\AbstractService;
use App\Repositories\Domain\SituacaoUsuarioRepository;

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
