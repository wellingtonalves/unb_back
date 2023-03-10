<?php

namespace App\Services;

use App\Criteria\FiltraPorUsuarioCriteria;
use App\Exceptions\ValidarInscricaoException;
use App\Models\Curso;
use App\Models\Oferta;
use App\Repositories\InscricaoRepository;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Prettus\Repository\Exceptions\RepositoryException;

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
     * @var MoodleService
     */
    protected $moodleService;

    /**
     * @var CanvasService
     */
    protected $canvasService;

    /**
     * CursoService constructor.
     * @param InscricaoRepository $repository
     * @param MoodleService $moodleService
     * @param CanvasService $canvasService
     */
    public function __construct(InscricaoRepository $repository, MoodleService $moodleService, CanvasService $canvasService)
    {
        $this->repository = $repository;
        $this->moodleService = $moodleService;
        $this->canvasService = $canvasService;
        $this->today = date('Y-m-d H:m:s', time());
    }

    /**
     * @return mixed
     * @throws RepositoryException
     */
    public function retornaCursosEmAndamento()
    {
        try {

            $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
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

            $inscricoes = request()->pagination == 'false' ? $data->all() : $data->paginate($perPage);

            $inscricoes->map(function ($item) {
                $item['tx_url_ava'] = $this->retornaUrlCursoAva($item->oferta);
            });

            return Response::custom('success_operation', $inscricoes);
        } catch (Exception $exception) {
            Log::info($exception->getMessage());
            return Response::custom('error_operation', $exception);
        }
    }

    /**
     * @return mixed
     * @throws RepositoryException
     */
    public function retornaCursosFinalizado()
    {
        try {

            $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
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
     * @throws RepositoryException
     */
    public function retornaCursostrancado()
    {
        try {

            $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
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

    /**
     * @param Oferta $oferta
     * @return mixed
     */
    protected function retornaUrlCursoAva(Oferta $oferta)
    {
        $typeAva = strtolower(trim($oferta->ava->tp_ava));
        $service = $typeAva . 'Service';
        $metodoAtualizaUsuario = 'retornaUrlCurso' . ucfirst($typeAva);
        return $this->$service->$metodoAtualizaUsuario($oferta, $oferta->ava);
    }

    /**
     * @return mixed
     */
    public function comprovantesInscricao()
    {
        try {
            $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
            $this->repository->pushCriteria(app(FiltraPorUsuarioCriteria::class));

            $data = $this->repository->with($this->repository->relationships);

            return Response::custom('success_operation', $data->all());
        } catch (\Exception $exception) {
            Log::info($exception->getMessage());
            return Response::custom('error_operation', $exception);
        }
    }

    /**
     * @param $nrCodigoValidador
     * @return InscricaoRepository|mixed
     */
    public function validar($nrCodigoValidador)
    {
        try {
            $data = $this->repository->with(['pessoa', 'oferta.curso'])
                ->where('nr_codigo_validador', '=', $nrCodigoValidador)->first();
            if (!$data) {
                throw new ValidarInscricaoException();
            }
            return Response::custom('success_operation', $data);
        } catch (\Exception $exception) {
            Log::info($exception->getMessage());
            return Response::custom(null, $exception);
        }
    }

    /**
     * @param $id
     * @return mixed
     * @throws RepositoryException
     */
    public function gerarComprovanteInscricao($id)
    {
        return $this->gerarPdfInscricao($this->repository->with($this->repository->relationships)->find($id));
    }

    /**
     * @param $data
     * @return mixed
     */
    private function gerarPdfInscricao($data)
    {
        $data = [
            'tx_nome_pessoa' => $data->pessoa->tx_nome_pessoa,
            'tx_nome_curso' => $data->oferta->curso->tx_nome_curso,
            'tx_nome_oferta' => $data->oferta->tx_nome_oferta,
            'dt_inscricao' => formataData($data->dt_inscricao),
            'dt_termino_oferta' => formataData($data->oferta->dt_termino_oferta),
            'qt_carga_horaria_oferta' => $data->oferta->qt_carga_horaria_oferta,
            'qt_nota_minima_aprovacao' => $data->oferta->qt_nota_minima_aprovacao,
            'qt_duracao_dias' => $data->oferta->qt_duracao_dias,
            'tutoria' => $data->oferta->tp_com_tutoria == 'S' ? 'COM TUTORIAL' : 'SEM TUTORIA',
            'nr_codigo_validador' => $data->nr_codigo_validador,
        ];

        $certificado = \PDF::loadView('inscricao.modelo01', ['inscricao' => $data])->setPaper('a4', 'portrait');
        return $certificado->stream('inscricao.pdf');
    }

    /**
     * @param $days
     * @return mixed
     */
    public function cursosMaisAcessados($days)
    {
        try {

            $data = DB::table('tb_inscricao')
                ->select('tb_curso.tx_nome_curso', 'tb_curso.tx_url_imagem_curso', 'tb_curso.tp_origem_curso',
                    'tb_curso.qt_carga_horaria_minima', 'tb_tematica_curso.tx_nome_tematica_curso')
                ->selectRaw('tb_inscricao.id_oferta,  count(id_inscricao) as qtd_inscricao')
                ->join('tb_oferta', 'tb_oferta.id_oferta', '=', 'tb_inscricao.id_oferta')
                ->join('tb_curso', 'tb_curso.id_curso', '=', 'tb_oferta.id_curso')
                ->join('tb_tematica_curso', 'tb_tematica_curso.id_tematica_curso', '=', 'tb_curso.id_tematica_curso')
                ->groupBy('tb_inscricao.id_oferta', 'tb_curso.tx_nome_curso', 'tb_curso.tx_url_imagem_curso',
                    'tb_curso.qt_carga_horaria_minima', 'tb_tematica_curso.tx_nome_tematica_curso', 'tb_curso.tp_origem_curso')
                ->orderBy('qtd_inscricao', 'desc')
                ->limit(8)
                ->where('dt_inscricao', '>', today()->subDays($days))->get();


            return Response::custom('success_operation', $data);
        } catch (Exception $exception) {
            Log::info($exception->getMessage());
            return Response::custom('error_operation', $exception);
        }
    }

}
