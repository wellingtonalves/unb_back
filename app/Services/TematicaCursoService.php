<?php

namespace App\Services;

use App\Criteria\CatalogoCursoCriteria;
use App\Models\Inscricao;
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
            $data = $this->repository->with(['curso' => function($query) {$query->where('tp_situacao_curso', '=', 'A');}]);
            $perPage = request()->has('per_page') ? request()->per_page : null;
            $data = request()->pagination == 'false' ? $data->all() : $data->paginate($perPage);

            if (request()->id_usuario) {
                foreach ($data as $key => $tematica) {
                    foreach ($tematica['curso'] as $key1 => $curso ) {
                        if($curso['oferta_atual']) {
                            $data[$key]['curso'][$key1]['inscricao'] = Inscricao::where([
                                ['id_pessoa', request()->id_usuario],
                                ['id_oferta', $curso['oferta_atual']['id_oferta']]
                            ])->first();
                        }
                    }
                }
            }

            return Response::custom('success_operation', $data);
        } catch (Exception $exception) {
            Log::info($exception->getMessage());
            return Response::custom('error_operation', $exception);
        }
    }
}
