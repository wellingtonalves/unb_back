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
