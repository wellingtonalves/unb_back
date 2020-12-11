<?php

namespace App\Services;

use App\Models\Ava;
use App\Models\Oferta;
use App\Models\Usuario;
use App\Repositories\CanvasRepository;
use Exception;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Log;

class CanvasService
{

    /**
     * @var CanvasRepository
     */
    protected $repository;

    /**
     * CanvasService constructor.
     * @param CanvasRepository $repository
     */
    public function __construct(CanvasRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     *
     *
     * @param string $url
     * @param string $token
     * @return mixed
     * @throws GuzzleException
     */
    public function buscaInfoSiteCanvas($url, $token)
    {
        $this->repository->setAvaCanvas(null, $url, $token);
        $siteInfo = $this->verificaErro($this->repository->getSiteInfo());
        if(!$siteInfo instanceof Exception) {
            if(empty($siteInfo[0])) {
                return new Exception('Não foi possível consultar as informações do AVA.');
            }
        }

        return $siteInfo;
    }

    /**
     * Registra log com erro caso a API retorne exception ou nada (podemos add mais verificacoes de erro aqui)
     *
     * @param json|false
     * @return Exception
     */
    protected function verificaErro($response)
    {
        if (!$response) {
            return new Exception('Erro na requisição. Tente novamente.');
        } else {
            return $response;
        }
    }

    /**
     * Atualiza usuario no Canvas
     *
     * @param Usuario $usuario
     * @param int $idAva
     * @return mixed
     * @throws GuzzleException
     */
    public function atualizaUsuarioCanvas(Usuario $usuario, $idAva)
    {
        try {
            $this->repository->setAvaCanvas($idAva);
            $usuarioCanvas = $this->buscaUsuarioCanvasPorIdUsuario($usuario->id_usuario);
            if($usuarioCanvas) {
                $idUsuarioCanvas = $usuarioCanvas->id;
            } else {
                return new Exception('O usuário não foi encontrado no Canvas.');
            }

            $nomeInteiro = empty($usuario->pessoa->tx_nome_social) ? $usuario->pessoa->tx_nome_pessoa : $usuario->pessoa->tx_nome_social;

            // Monta os parametros
            $parametros = [];
            $parametros['user']['name'] = $nomeInteiro;
            $parametros['user']['email'] = strtolower($usuario->tx_login_usuario);

            $usuarioAtualizado = $this->verificaErro($this->repository->setUsuarioCanvas($idUsuarioCanvas, $parametros));
            if(!$usuarioAtualizado instanceof Exception) {
                return $usuarioAtualizado;
            } else {
                return new Exception('Não foi possível atualizar o usuário no Canvas.');
            }
        } catch (Exception $exception) {
            Log::error('Erro ao atualizar dados do aluno no Canvas: ' . $exception->getMessage());
            return new Exception('Erro ao atualizar usuário no Canvas.');
        }
    }

    /**
     * Consulta o usuario no Canvas
     *
     * @param int $idUsuario
     * @return mixed
     * @throws GuzzleException
     */
    protected function buscaUsuarioCanvasPorIdUsuario($idUsuario)
    {
        $usuarioCanvas = $this->verificaErro($this->repository->getUsuarioCanvas($idUsuario . '-EVG'));
        if(!$usuarioCanvas instanceof Exception) {
            if(isset($usuarioCanvas[0]->id)) {
                return $usuarioCanvas[0];
            }
        }

        return false;
    }

    /**
     * Monta e retorna URL do curso no Canvas
     *
     * @param Oferta $oferta
     * @param Ava $ava
     * @return mixed
     */
    public function retornaUrlCursoCanvas(Oferta $oferta, Ava $ava)
    {
        try {
            $this->repository->setAvaCanvas($ava->id_ava);
            $cursoCanvas = $this->verificaErro($this->buscaCursoCanvasPorIdCurso($oferta->id_curso));
            $url = null;
            if($cursoCanvas) {
                $url = $ava->tx_url . '/courses/' . $cursoCanvas->id;
            }

            return $url;
        } catch(Exception $exception) {
            Log::error('Erro ao buscar curso no Canvas: ' . $exception->getMessage());
            return new Exception('Erro ao buscar curso no Canvas.');
        }
    }

    /**
     * Busca curso no Canvas atraves do id_curso
     *
     * @param int $idCurso
     * @return mixed
     * @throws GuzzleException
     */
    protected function buscaCursoCanvasPorIdCurso($idCurso)
    {
        $curso = $this->verificaErro($this->repository->getCursoCanvas($idCurso . '-EVG'));
        if(!$curso instanceof Exception) {
            if(isset($curso[0]->id)) {
                return $curso[0];
            }
        }

        return false;
    }
}
