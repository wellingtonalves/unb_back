<?php

namespace App\Services;

use App\Repositories\AvaRepository;
use App\Services\AbstractService;

class AvaService extends AbstractService
{

    /**
     * @var AvaRepository
     */
    protected $repository;

    /**
     * AvaService constructor.
     * @param AvaRepository $repository
     */
    public function __construct(AvaRepository $repository)
    {
        $this->repository = $repository;
    }
}
