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

    /**
     *
     * @param int $id
     * @return AvaRepository
     * @throws Exception
     */
    public function find($id)
    {
        $ava = parent::find($id);
        $ava->tp_ava = trim($ava->tp_ava);
        
        return $ava;
    }
}
