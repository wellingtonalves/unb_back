<?php

namespace App\Services;

use App\Models\Usuario;
use App\Repositories\CanvasRepository;
use Exception;
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
}
