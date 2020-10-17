<?php

namespace App\Services;

use App\Repositories\TarefaAgendadaRepository;
use App\Services\AbstractService;

class TarefaAgendadaService extends AbstractService
{

    /**
     * @var TarefaAgendadaRepository
     */
    protected $repository;

    /**
     * TarefaAgendadaService constructor.
     * @param TarefaAgendadaRepository $repository
     */
    public function __construct(TarefaAgendadaRepository $repository)
    {
        $this->repository = $repository;
    }
}
