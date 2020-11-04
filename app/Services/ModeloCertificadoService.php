<?php

namespace App\Services;

use App\Repositories\ModeloCertificadoRepository;

class ModeloCertificadoService extends AbstractService
{

    /**
     * @var ModeloCertificadoRepository
     */
    protected $repository;

    /**
     * ModeloCertificadoService constructor.
     * @param ModeloCertificadoRepository $repository
     */
    public function __construct(ModeloCertificadoRepository $repository)
    {
        $this->repository = $repository;
    }
}
