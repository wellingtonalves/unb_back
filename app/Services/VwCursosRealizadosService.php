<?php

namespace App\Services;

use App\Criteria\VwCursosRealizadosCriteria;
use App\Repositories\VwCursosRealizadosRepository;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Prettus\Repository\Exceptions\RepositoryException;

class VwCursosRealizadosService extends AbstractService
{

    /**
     * @var VwCursosRealizadosRepository
     */
    protected $repository;

    /**
     * AvaService constructor.
     * @param VwCursosRealizadosRepository $repository
     */
    public function __construct(VwCursosRealizadosRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return mixed
     * @throws RepositoryException
     */
    public function all()
    {
        $result = [];
        $possibleConnections = [
// TODO - liberar o banco da secretaria quando o Molina criar a view vw_cursos_realizados nele.
//            'secretaria',
            'esaf',
            'sof',
            'spoc',
            'suap'
        ];

        try {

            $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
            $this->repository->pushCriteria(app(VwCursosRealizadosCriteria::class));
            $perPage = request()->has('per_page') ? request()->per_page : null;


            foreach ($possibleConnections as $newConnection) {

                $this->repository->makeModel()->setConnection($newConnection);
                $data = $this->repository->with($this->repository->relationships);
                $data = request()->pagination == 'false' ? $data->all() : $data->paginate($perPage);
                $data = $data->toArray();

                if ((isset($data['current_page']) && !empty($data['data'])) || (!isset($data['current_page']) && !empty($data))) {
                    $result[$newConnection] = $data;
                }
            }

            return Response::custom('success_operation', $result);
        } catch (Exception $exception) {
            Log::info($exception->getMessage());
            return Response::custom('error_operation', $exception);
        }
    }

}
