<?php

namespace App\Services;

use App\Criteria\CertificadoCriteria;
use App\Repositories\CertificadoProgramaRepository;
use App\Repositories\InscricaoProgramaRepository;
use App\Repositories\InscricaoRepository;
use App\Repositories\ProgramaCursoRepository;
use App\Repositories\ProgramaRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

class CertificadoProgramaService extends AbstractService
{

    /**
     * @var CertificadoProgramaRepository
     */
    protected $repository;
    /**
     * @var InscricaoProgramaRepository
     */
    protected $inscricaoProgramaRepository;
    /**
     * @var InscricaoRepository
     */
    private $inscricaoRepository;
    /**
     * @var ProgramaRepository
     */
    private $programaRepository;

    /**
     * CursoService constructor.
     * @param CertificadoProgramaRepository $repository
     * @param InscricaoProgramaRepository $inscricaoProgramaRepository
     * @param ProgramaRepository $programaRepository
     * @param InscricaoRepository $inscricaoRepository
     */
    public function __construct(
        CertificadoProgramaRepository $repository,
        InscricaoProgramaRepository $inscricaoProgramaRepository,
        ProgramaRepository $programaRepository,
        InscricaoRepository $inscricaoRepository
    )
    {
        $this->repository = $repository;
        $this->inscricaoProgramaRepository = $inscricaoProgramaRepository;
        $this->inscricaoRepository = $inscricaoRepository;
        $this->programaRepository = $programaRepository;
    }

    /**
     * Returns a paginated list of Model.
     *
     * @return mixed
     */
    public function all()
    {
        try {
            $certificados = $this->getInsricoesCertificado();

            $data = $this->programaRepository->with('programaCurso')
                ->get()
                ->filter(function ($programa) use ($certificados) {
                    return !$this->verificaInscricoesNoPrograma($programa, $certificados);
                })->values();

            $perPage = request()->has('per_page') ? request()->per_page : 10;
            $data = request()->pagination == 'false' ? $data : $data->paginate($perPage);
            return Response::custom('success_operation', $data);
        } catch (Exception $exception) {
            Log::info($exception->getMessage());
            return Response::custom('error_operation', $exception);
        }
    }

    /**
     * Data of a Model by primary key
     *
     * @param int|string $id
     *
     * @return mixed
     * @throws \Exception
     */
    public function find($id)
    {
        try {
            $data = $this->repository->with($this->repository->relationships)->find($id);
            if (!$data) {
                throw new \Exception('Erro ao gerar o certificado. Tente novamente.');
            }

            return $this->geraCertificado($data);
        } catch (Exception $exception) {
            Log::info($exception->getMessage());
            return Response::custom('error_operation', $exception);
        }
    }

    /**
     * Store a newly created Model in storage.
     *
     * @param Request $request
     *
     * @return mixed
     */
    public function create(Request $request)
    {
        try {
            $user = $request->user();
            $inscricao = $this->inscricaoRepository
                ->where('id_inscricao', '=', $request->get('id_inscricao'))
                ->first();

            if (!$inscricao) {
                throw new \Exception('Erro ao gerar o certificado. Tente novamente.');
            }

            $data = $this->repository->create([
                'id_certificado' => $inscricao->id_inscricao,
                'sg_pais_nacionalidade' => $user->pessoa->sg_pais_nacionalidade,
                'dt_emissao_certificado' => Carbon::now(),
                'nr_codigo_validador' => hashCertificado($inscricao->id_inscricao),
                'tx_nome_pessoa' => $user->pessoa->tx_nome_pessoa,
                'dt_nascimento' => $user->pessoa->dt_nascimento,
                'nr_cpf' => $user->pessoa->nr_cpf,
            ]);

            return $this->geraCertificado($this->repository->with($this->repository->relationships)->find($data->id_certificado));
        } catch (Exception $exception) {
            Log::info($exception->getMessage());
            return Response::custom('error_operation', $exception);
        }
    }

    /**
     * @param $data
     * @return mixed
     */
    private function geraCertificado($data)
    {
        $data = [
            'tx_nome_pessoa' => $data->tx_nome_pessoa,
            'nr_cpf' => $data->nr_cpf,
            'dt_nascimento' => formataData($data->dt_nascimento),
            'sg_pais_nacionalidade' => $data->sg_pais_nacionalidade,
            'tx_nome_curso' => $data->inscricao->oferta->curso->tx_nome_curso,
            'tx_nome_oferta' => $data->inscricao->oferta->tx_nome_oferta,
            'dt_inscricao' => formataData($data->inscricao->dt_inscricao),
            'dt_fim_inscricao' => formataData($data->inscricao->dt_fim_inscricao),
            'qt_carga_horaria_oferta' => $data->inscricao->oferta->qt_carga_horaria_oferta,
            'nr_codigo_validador' => $data->nr_codigo_validador,
            'qt_nota_final' => $data->inscricao->qt_nota_final,
            'tx_conteudo_programatico' => $data->inscricao->oferta->curso->tx_conteudo_programatico,
        ];

        $certificado = \PDF::loadView('certificado.modelo01', ['certificado' => $data])->setPaper('a4', 'landscape');
        return $certificado->stream('certificado.pdf');
    }

    /**
     * Lista os certificados do usuario autenticado
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator|\Illuminate\Support\Collection|mixed
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    private function getInsricoesCertificado()
    {
        $this->inscricaoRepository->pushCriteria(app(CertificadoCriteria::class));
        $certificados = $this->inscricaoRepository->with(['oferta.curso', 'certificado'])
            ->whereIn('tp_situacao_inscricao', ['APROVADO', 'CERTIFICADO'])
            ->all();

        return $certificados ? $certificados->pluck('oferta.curso')->pluck('id_curso') : [];
    }

    /**
     * @param $programa
     * @param $inscricoes
     * @return int
     */
    private function verificaInscricoesNoPrograma(object $programa, object $inscricoes)
    {
        return count(array_diff($programa->programaCurso->pluck('id_curso')->toArray(), $inscricoes->toArray()));
    }
}
