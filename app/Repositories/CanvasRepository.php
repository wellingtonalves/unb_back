<?php

namespace App\Repositories;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Log;

class CanvasRepository
{
    /**
     * @var AvaRepository
     */
    protected $avaRepository;
    protected $url;
    protected $token;
    public $idAva;

    public function __construct(AvaRepository $avaRepository)
    {
        $this->avaRepository = $avaRepository;
    }

    /**
     * Altera valores de url, token e idAva(se existir)
     *
     * @param string $url
     * @param string $token
     */
    public function setAvaCanvas($idAva = null, $url = null, $token = null)
    {
        if ($idAva) {
            $ava = $this->avaRepository->findWhere(['id_ava' => $idAva, ['tp_ava', '=', 'CANVAS'],
                ['tp_situacao_ava', '=', 'A'], ['tp_operacional', '=', 'S']]);

            if ($ava->isNotEmpty()) {
                $this->idAva = $ava->first()->getKey();
                $this->url = $ava->first()->tx_url;
                $this->token = $ava->first()->tx_token;
            }
        } else {
            $this->url = $url;
            $this->token = $token;

            $ava = $this->avaRepository->findWhere([['tx_url', '=', $url], ['tx_token', '=', $token],
                ['tp_ava', '=', 'CANVAS'], ['tp_situacao_ava', '=', 'A'], ['tp_operacional', '=', 'S']]);
            $this->idAva = $ava->isNotEmpty() ? $ava->first()->getKey() : null;
        }
    }

    /**
     * Servico Canvas utilizado na integracao com os ambientes AVA.
     * O retorno deve ser tratado por quem for utilizar esse metodo.
     *
     * @param string $urlServico
     * @param string $metodo Metodo HTTP da requisicao (GET|POST|PUT|DELETE)
     * @param array $parametros
     * @return GuzzleHttp\Client|false
     * @throws GuzzleException
     */
    protected function servicoCanvas($urlServico, $metodo, $parametros)
    {
        try {
            $client = new Client();
            $urlCompleta = $this->url . '/api' . $urlServico;

                $res = $client->request($metodo, $urlCompleta,
                    [
                        'headers' => ['User-Agent' => 'Secretaria EVG', 'Authorization' => 'Bearer ' . $this->token],
                        'form_params' => $parametros
                    ]
                );
                return json_decode($res->getBody()->getContents());
        } catch (RequestException $ex) {
            Log::notice('(catch-servicoCanvas)Erro no servico do Canvas: ' . $ex->getMessage());
            return false;
        } catch (ClientException $ex) {
            Log::notice('(catch-servicoCanvas)Erro na requisi????o ao Canvas: ' . $ex->getMessage());
            return false;
        }
    }


    /**
     * Informacoes do AVA
     *
     * @return mixed
     * @throws GuzzleException
     */
    public function getSiteInfo()
    {
        return $this->servicoCanvas('/v1/accounts', 'GET', null);
    }

    /**
     * Atualiza usuario no Canvas
     *
     * @param int $idUsuarioCanvas
     * @param array $parametros
     * @return mixed
     * @throws GuzzleException
     */
    public function setUsuarioCanvas($idUsuarioCanvas, $parametros)
    {
        return $this->servicoCanvas('/v1/users/' . $idUsuarioCanvas, 'PUT', $parametros);
    }

    /**
     * Consulta Usuario no Canvas
     *
     * @param string $idEvg
     * @return mixed
     * @throws GuzzleException
     */
    public function getUsuarioCanvas($idEvg)
    {
        return $this->servicoCanvas('/v1/accounts/self/users', 'GET', ['search_term' => $idEvg]);
    }

    /**
     * Consulta curso (section) no Canvas de acordo com o id_curso
     *
     * @param int $idEvg
     * @return mixed
     * @throws GuzzleException
     */
    public function getCursoCanvas($idEvg)
    {
        return $this->servicoCanvas('/v1/accounts/self/courses', 'GET', ['search_term' => $idEvg]);
    }
}
