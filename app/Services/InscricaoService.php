<?php

namespace App\Services;

use App\Repositories\InscricaoRepository;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class InscricaoService extends AbstractService
{

    /**
     * @var InscricaoRepository
     */
    protected $repository;

    /**
     * @var false|string
     */
    private $today;

    /**
     * CursoService constructor.
     * @param InscricaoRepository $repository
     */
    public function __construct(InscricaoRepository $repository)
    {
        $this->repository = $repository;
        $this->today = date('Y-m-d H:m:s', time());
    }

    /**
     * @return mixed
     */
    public function retornaCursosEmAndamento()
    {
        try {

            $perPage = request()->has('per_page') ? request()->per_page : null;
            $data = $this->repository->with($this->repository->relationships)->scopeQuery(function ($query) {
                return $query->where([
                    ['id_pessoa', '=', auth()->user()->getAuthIdentifier()],
                    ['tp_situacao_inscricao', '=', 'EM_CURSO']
                ])->orWhere([
                    ['id_pessoa', '=', auth()->user()->getAuthIdentifier()],
                    ['dt_fim_inscricao', '>=', $this->today],
                    ['tp_situacao_inscricao', '=', 'APROVADO']
                ]);
            });
            $data = request()->pagination == 'false' ? $data->all() : $data->paginate($perPage);

            return Response::custom('success_operation', $data);
        } catch (Exception $exception) {
            Log::info($exception->getMessage());
            return Response::custom('error_operation', $exception);
        }
    }

    /**
     * @return mixed
     */
    public function retornaCursosFinalizado()
    {
        try {

            $perPage = request()->has('per_page') ? request()->per_page : null;
            $data = $this->repository->with($this->repository->relationships)->scopeQuery(function ($query) {
                return $query->where([
                    ['id_pessoa', auth()->user()->getAuthIdentifier()],
                    ['dt_fim_inscricao', '<', $this->today]
                ]);
            });
            $data = request()->pagination == 'false' ? $data->all() : $data->paginate($perPage);

            return Response::custom('success_operation', $data);
        } catch (Exception $exception) {
            Log::info($exception->getMessage());
            return Response::custom('error_operation', $exception);
        }
    }

    /**
     * @return mixed
     */
    public function retornaCursostrancado()
    {
        try {

            $perPage = request()->has('per_page') ? request()->per_page : null;
            $data = $this->repository->with($this->repository->relationships)->scopeQuery(function ($query) {
                return $query->where([
                    ['id_pessoa', auth()->user()->getAuthIdentifier()],
                    ['tp_situacao_inscricao', 'CANC_DESISTENTE'],
                    ['dt_fim_inscricao', '>=', $this->today]
                ]);
            });
            $data = request()->pagination == 'false' ? $data->all() : $data->paginate($perPage);

            return Response::custom('success_operation', $data);
        } catch (Exception $exception) {
            Log::info($exception->getMessage());
            return Response::custom('error_operation', $exception);
        }
    }
}
