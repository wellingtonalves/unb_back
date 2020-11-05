<?php

namespace App\Services\Domain;

use App\Repositories\Domain\ModeloCertificadoRepository;
use App\Services\AbstractService;

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
