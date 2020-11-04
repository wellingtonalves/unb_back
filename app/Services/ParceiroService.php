<?php

namespace App\Services;

use App\Repositories\ParceiroRepository;

class ParceiroService extends AbstractService
{

    /**
     * @var ParceiroRepository
     */
    protected $repository;

    /**
     * ParceiroService constructor.
     * @param ParceiroRepository $repository
     */
    public function __construct(ParceiroRepository $repository)
    {
        $this->repository = $repository;
    }
}
