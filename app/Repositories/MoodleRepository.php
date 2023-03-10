<?php

namespace App\Repositories;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Log;

class MoodleRepository
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
    public function setAvaMoodle($idAva = null, $url = null, $token = null)
    {
        if ($idAva) {
            $ava = $this->avaRepository->findWhere(['id_ava' => $idAva, ['tp_ava', '=', 'MOODLE'],
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
                ['tp_ava', '=', 'MOODLE'], ['tp_situacao_ava', '=', 'A'], ['tp_operacional', '=', 'S']]);
            $this->idAva = $ava->isNotEmpty() ? $ava->first()->getKey() : null;
        }
    }

    /**
     * Servico Moodle utilizado na integracao com os ambientes AVA.
     * O retorno deve ser tratado por quem for utilizar esse metodo.
     *
     * @param string $funcao
     * @param array $parametros
     * @param boolean $original Se verdade, nao trata o retorno. Se falso, utiliza json_decode() para retornar
     * @return GuzzleHttp\Client|false
     * @throws GuzzleException
     */
    protected function servicoMoodle($funcao, $parametros, $original = false)
    {
        try {
            $client = env('APP_ENV', 'local') == 'local' ? new Client(['verify' => false ]) : new Client();
            $url = $this->url.'/webservice/rest/server.php?wstoken='.$this->token.'&'
                . 'wsfunction=' . $funcao . '&moodlewsrestformat=json';

            if($original) {
                $res = $client->request('POST', $url, ['headers' => ['User-Agent' => 'Secretaria EVG'], 'form_params' => $parametros]);
                return $res;
            } else {
                $res = $client->request('POST', $url, ['headers' => ['User-Agent' => 'Secretaria EVG'], 'form_params' => $parametros]);
                $retornoTratado = json_decode($res->getBody()->getContents());
                return $retornoTratado;
            }
        } catch (RequestException $ex) {
            Log::notice('(catch-servicoMoodle)Erro no servico do Moodle: ' . $ex->getMessage());
            return false;
        } catch (ClientException $ex) {
            Log::notice('(catch-servicoMoodle)Erro na requisi????o ao Moodle: ' . $ex->getMessage());
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
        return $this->servicoMoodle("core_webservice_get_site_info", []);
    }

    /**
     * Consulta usuario no Moodle
     *
     * @param string $keyParam
     * @param string $valueParam
     * @return mixed
     * @throws GuzzleException
     */
    public function getUsuarioMoodle($keyParam, $valueParam)
    {
        $parametros = [];
        $parametros['field'] = $keyParam;
        $parametros['values'][0] = $valueParam;

        return $this->servicoMoodle('core_user_get_users_by_field', $parametros);
    }

    /**
     * Atualiza o usuario no Moodle
     *
     * @param array $parametros
     * @return mixed
     * @throws GuzzleException
     */
    public function setUsuarioMoodle($parametros)
    {
        $this->servicoMoodle('core_user_update_users', $parametros);
    }

    /**
     * Consulta curso no Moodle pelo idnumber atraves do id_oferta
     *
     * @param string $keyParam
     * @param string $valueParam
     * @return mixed
     * @throws GuzzleException
     */
    public function getCursoMoodle($keyParam, $valueParam)
    {
        $parametros['field'] = $keyParam;
        $parametros['value'] = $valueParam;
        return $this->servicoMoodle('core_course_get_courses_by_field', $parametros);
    }
}
