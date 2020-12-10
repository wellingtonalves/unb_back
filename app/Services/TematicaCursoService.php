<?php

namespace App\Services;

use App\Repositories\TematicaCursoRepository;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Prettus\Repository\Exceptions\RepositoryException;

class TematicaCursoService extends AbstractService
{

    /**
     * @var TematicaCursoRepository
     */
    protected $repository;

    /**
     * TematicaCursoService constructor.
     * @param TematicaCursoRepository $repository
     */
    public function __construct(TematicaCursoRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return mixed
     * @throws RepositoryException
     */
    public function catalogoCurso()
    {
        try {
            $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
            $data = $this->repository->with('curso');
            $perPage = request()->has('per_page') ? request()->per_page : null;
            $data = request()->pagination == 'false' ? $data->all() : $data->paginate($perPage);
            return Response::custom('success_operation', $data);
        } catch (Exception $exception) {
            Log::info($exception->getMessage());
            return Response::custom('error_operation', $exception);
        }
    }
}
