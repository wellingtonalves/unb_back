<?php

namespace App\Services;

use App\Models\Usuario;
use App\Repositories\InscricaoRepository;
use App\Repositories\UsuarioRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class UsuarioService extends AbstractService
{

    /**
     * @var UsuarioRepository
     */
    protected $repository;

    /**
     * @var InscricaoRepository
     */
    protected $inscricaoRepository;

    /**
     * @var MoodleService
     */
    protected $moodleService;

    /**
     * @var CanvasService
     */
    protected $canvasService;

    /**
     * UsuarioService constructor.
     *
     * @param UsuarioRepository $repository
     * @param InscricaoRepository $inscricaoRepository
     * @param MoodleService $moodleService
     * @param CanvasService $canvasService
     */
    public function __construct(UsuarioRepository $repository, InscricaoRepository $inscricaoRepository, MoodleService $moodleService, CanvasService $canvasService)
    {
        $this->repository = $repository;
        $this->inscricaoRepository = $inscricaoRepository;
        $this->moodleService = $moodleService;
        $this->canvasService = $canvasService;
    }

    /**
     *
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function update(Request $request, $id)
    {
        try {
            $data = $this->repository->update($request->all(), $id);

            /**
             * Talvez seja melhor colocar isso no Repository
             */
            $inscricoes = $this->inscricaoRepository->where('id_pessoa', '=', $id)->get();

            $arrAvas = [];
            foreach($inscricoes as $inscricao) {
                if(!in_array($inscricao->oferta->ava->id_ava, $arrAvas)) {
                    $arrAvas[] = $inscricao->oferta->ava->id_ava;
                    $this->atualizaUsuarioAva($data, $inscricao->oferta->ava->id_ava, $inscricao->oferta->ava->tp_ava);
                }
            }

            return Response::custom('success_operation', $data);
        } catch (Exception $exception) {
            Log::info($exception->getMessage());
            return Response::custom('error_operation', $exception);
        }
    }

    /**
     * Faz a requisicao no AVA a depender do tipo
     *
     * @param Usuario $usuario
     * @param int $idAva
     * @param string $tipoAva
     * @return mixed
     */
    protected function atualizaUsuarioAva(Usuario $usuario, $idAva, $tipoAva)
    {
        $typeAva = strtolower(trim($tipoAva));
        $service =  $typeAva . 'Service';
        $metodoAtualizaUsuario = 'atualizaUsuario' . ucfirst($typeAva);
        return $this->$service->$metodoAtualizaUsuario($usuario, $idAva);
    }
}
