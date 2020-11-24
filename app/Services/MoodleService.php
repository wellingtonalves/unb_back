<?php

namespace App\Services;

use App\Repositories\MoodleRepository;
use Exception;
use Illuminate\Support\Facades\Log;

class MoodleService
{

    /**
     * @var MoodleRepository
     */
    protected $repository;

    /**
     * MoodleService constructor.
     * @param MoodleRepository $repository
     */
    public function __construct(MoodleRepository $repository)
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
    public function buscaInfoSiteMoodle($url, $token)
    {
        $this->repository->setAvaMoodle(null, $url, $token);
        $siteInfo = $this->verificaErro($this->repository->getSiteInfo());
        if(empty($siteInfo->sitename)) {
            return new Exception('Não foi possível consultar as informações do AVA.');
        }

        return $siteInfo;
    }

    /**
     * Registra log com erro caso a API retorne exception ou nada (podemos add mais verificacoes de erro aqui) 
     * 
     * @param json|false $response
     */
    protected function verificaErro($response)
    {
        if (!$response) {
            return new Exception('Erro na requisição. Tente novamente.');
        } elseif (isset($response->exception)) {
            // O valor pode mudar dependendo se o debug do AVA estiver ativado ou nao
            $erro = $response->debuginfo ?? $response->message;
            Log::info('(exception-servicoMoodle)Erro no servico do Moodle: ' . $erro);
            return new Exception('Erro na API. Tente novamente.');
        } else {
            return $response;
        }
    }

    /**
     * Atualiza usuario no Moodle
     *
     * @param Usuario $usuario
     * @param int $idAva
     * @return mixed
     */
    public function atualizaUsuarioMoodle(Usuario $usuario, $idAva)
    {
        try {
            $this->repository->setAvaMoodle($idAva);
            $usuarioMoodle = $this->buscaUsuarioMoodlePorIdnumber($usuario->id_usuario);
            if($usuarioMoodle) {
                $idUsuarioMoodle = $usuarioMoodle->id;
            } else {
                return new Exception('O usuário não foi encontrado no Moodle.');
            }

            $nomeInteiro = empty($usuario->pessoa->tx_nome_social) ? $usuario->pessoa->tx_nome_pessoa : $usuario->pessoa->tx_nome_social;
            $nome = $this->separaNome($nomeInteiro);

            $sigla = $usuario->pessoa->sg_pais_nacionalidade == 'NA' ?
                    '' : $usuario->pessoa->sg_pais_nacionalidade; //se a sigla for NA(Outro) fica em branco no Moodle
            // Monta os parametros
            $parametros = [];
            $parametros['users'][0]['id'] = $idUsuarioMoodle;
            $parametros['users'][0]['firstname'] = $nome['firstname'];
            $parametros['users'][0]['lastname'] = $nome['lastname'];
            $parametros['users'][0]['email'] = strtolower($usuario->email);
            $parametros['users'][0]['username'] = strtolower($usuario->email);
            $parametros['users'][0]['country'] = $sigla;
            $parametros['users'][0]['auth'] = 'secretaria';

            $usuarioAtualizado = $this->verificaErro($this->repository->setUsuarioMoodle($parametros));
            if(!$usuarioAtualizado instanceof Exception) {
                return $usuarioAtualizado;
            } else {
                return new Exception('Não foi possível atualizar o usuário no Moodle.');
            }
        } catch (RequestException $exception) {
            Log::error('Erro ao atualizar dados do aluno no Moodle: ' . $exception->getMessage());
            return new Exception('Erro ao atualizar usuário no Moodle.');
        }
    }

    /**
     * Busca usuario no Moodle por idnumber
     *
     * @param int $idUsuario
     * @return mixed
     */
    protected function buscaUsuarioMoodlePorIdnumber($idUsuario)
    {
        $usuarioPorIdnumber = $this->verificaErro($this->repository->getUsuarioMoodle('idnumber', $idUsuario . '-evg'));
        if(!$usuarioPorIdnumber instanceof Exception) {
            if(isset($usuarioPorIdnumber[0]->id)) {
                return $usuarioPorIdnumber[0];
            }
        }

        return false;
    }

    /**
     * Serve apenas para separar o nome em firstname e lastname
     *
     * @param string $strNome
     * @return array
     */
    protected function separaNome($strNome)
    {
        $arrNome = explode(' ', trim($strNome));
        $nome['firstname'] = $arrNome[0];
        $nome['lastname'] = ' -';
        if (count($arrNome) > 1) {
            unset($arrNome[0]);

            $nome['lastname'] = \implode(' ', $arrNome);
        }

        return $nome;
    }
}
