<?php

namespace App\Services;

use App\Repositories\VwValidacaoCertificadoRepository;

class VwValidacaoCertificadoService extends AbstractService
{

    /**
     * @var VwValidacaoCertificadoRepository
     */
    protected $repository;

    /**
     * AvaService constructor.
     * @param VwValidacaoCertificadoRepository $repository
     */
    public function __construct(VwValidacaoCertificadoRepository $repository)
    {
        $this->repository = $repository;
    }

}
