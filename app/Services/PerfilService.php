<?php

namespace App\Services;

use App\Repositories\PerfilRepository;

class PerfilService extends AbstractService
{

    /**
     * @var PerfilRepository
     */
    protected $repository;

    /**
     * AvaService constructor.
     * @param PerfilRepository $repository
     */
    public function __construct(PerfilRepository $repository)
    {
        $this->repository = $repository;
    }

}
