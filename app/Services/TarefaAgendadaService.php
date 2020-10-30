<?php

namespace App\Services;

use App\Repositories\TarefaAgendadaRepository;
use App\Services\AbstractService;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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

    /**
     * Returns a paginated list of Model.
     *
     * @return mixed
     */
    public function all()
    {
        try {
            $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
            $data = $this->repository->select(
                    DB::raw("*, '(' || tx_minuto || ' ' || tx_hora || ' ' || tx_dia_mes || ' ' || tx_mes || ' ' || tx_dia_semana || ')' as cron")
                )->with($this->repository->relationships);
            $perPage = request()->has('per_page') ? request()->per_page : null;
            return request()->pagination == 'false' ? $data->all() : $data->paginate($perPage);
        } catch (Exception $exception) {
            Log::info($exception->getMessage());
            return new Exception('Erro ao listar. Tente novamente.');
        }
    }

    /**
     * Retorna somente tarefas agendadas ativas
     *
     * @return TarefaAgendadaRepository
     * @throws Exception
     */
    public function buscaTarefasPorSituacao($situacao)
    {
        try {
            return $this->repository->where('tp_situacao_tarefa_agendada', '=', $situacao)->get();
        } catch(Exception $exception) {
            Log::info($exception->getMessage());
            return new Exception('Erro ao buscar tarefas agendadas ativas.');
        }
    }
}
