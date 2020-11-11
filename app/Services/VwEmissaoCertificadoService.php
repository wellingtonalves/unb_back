<?php

namespace App\Services;

use App\Criteria\VwEmissaoCertificadoCriteria;
use App\Exceptions\VwEmissaoCertificadoException;
use App\Repositories\VwEmissaoCertificadoRepository;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class VwEmissaoCertificadoService
{

    /**
     * @var VwEmissaoCertificadoRepository
     */
    protected $repository;

    /**
     * AvaService constructor.
     * @param VwEmissaoCertificadoRepository $repository
     */
    public function __construct(VwEmissaoCertificadoRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param $idCertificado
     * @param $txOrigem
     * @return mixed
     */
    public function find($idCertificado, $txOrigem)
    {

        if (!$idCertificado || !$txOrigem) {
            new VwEmissaoCertificadoException();
        }

        try {

            $data = $this->repository->makeModel()->setConnection($txOrigem)->find($idCertificado);
            return Response::custom('success_operation', $data);

        } catch (Exception $exception) {
            Log::info($exception->getMessage());
            return Response::custom('error_operation', $exception);
        }
    }

}
