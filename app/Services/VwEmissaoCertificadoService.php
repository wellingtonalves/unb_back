<?php

namespace App\Services;

use App\Criteria\VwEmissaoCertificadoCriteria;
use App\Repositories\VwEmissaoCertificadoRepository;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class VwEmissaoCertificadoService extends AbstractService
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

    public function all()
    {
        try {

            $this->repository->pushCriteria(app(VwEmissaoCertificadoCriteria::class));
            $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
            $data = $this->repository->with($this->repository->relationships);
            $perPage = request()->has('per_page') ? request()->per_page : null;
            $data = request()->pagination == 'false' ? $data->all() : $data->paginate($perPage);
            return Response::custom('success_operation', $data);
        } catch (Exception $exception) {
            Log::info($exception->getMessage());
            return Response::custom('error_operation', $exception);
        }
    }

}
