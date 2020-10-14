<?php

namespace App\Observers;

use App\Models\Pessoa;
use App\Models\Usuario;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UsuarioObserver
{
    /**
     * @var Request
     */
    protected $request;

    /**
     * UsuarioObserver constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Foi necessário criar uma observer para salvar a model de pessoa, pois a coluna id_pessoa além de PK,
     * também é uma FK da id_usuario, e a lib mappeble-model não consegue lidar com isso.
     *
     * @param Usuario $usuario
     * @return Usuario|Exception
     */
    public function created(Usuario $usuario)
    {
        try {

            $person = $this->request->pessoa;
            $person['id_pessoa'] = $usuario->id_usuario;
            Pessoa::create($person);

            return $usuario;

        } catch (Exception $exception) {
            //TODO - fazer tratamento de erros (usando o ResponseServiceProvider)
            Log::info($exception->getMessage());
            return new Exception($exception->getMessage());
        }
    }

    /**
     * @param Usuario $usuario
     * @return Usuario|Exception
     */
    public function updated(Usuario $usuario)
    {
        try {

            $personAtributtes = $this->request->pessoa;
            $person = Pessoa::find($usuario->id_usuario);
            $person->update($personAtributtes);

            return $usuario;

        } catch (Exception $exception) {
            //TODO - fazer tratamento de erros (usando o ResponseServiceProvider)
            Log::info($exception->getMessage());
            return new Exception($exception->getMessage());
        }
    }

    /**
     * @param Usuario $usuario
     * @return Usuario|Exception
     */
    public function deleting(Usuario $usuario)
    {
        try {

            $person = Pessoa::find($usuario->id_usuario);
            $person->delete();

            return $usuario;

        } catch (Exception $exception) {
            //TODO - fazer tratamento de erros (usando o ResponseServiceProvider)
            Log::info($exception->getMessage());
            return new Exception($exception->getMessage());
        }
    }

}
