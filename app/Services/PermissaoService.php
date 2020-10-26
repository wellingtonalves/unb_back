<?php

namespace App\Services;

use App\Repositories\PermissaoRepository;

class PermissaoService extends AbstractService
{

    /**
     * @var PermissaoRepository
     */
    protected $repository;

    /**
     * AvaService constructor.
     * @param PermissaoRepository $repository
     */
    public function __construct(PermissaoRepository $repository)
    {
        $this->repository = $repository;
    }

}
