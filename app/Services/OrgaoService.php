<?php

namespace App\Services;

use App\Repositories\OrgaoRepository;
use App\Services\AbstractService;

class OrgaoService extends AbstractService
{

    /**
     * @var OrgaoRepository
     */
    protected $repository;

    /**
     * OrgaoService constructor.
     * @param OrgaoRepository $repository
     */
    public function __construct(OrgaoRepository $repository)
    {
        $this->repository = $repository;
    }
}
