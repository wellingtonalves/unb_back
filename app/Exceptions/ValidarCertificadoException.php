<?php

namespace App\Exceptions;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ValidarCertificadoException extends \Exception
{
    public function __construct()
    {
        parent::__construct('Erro ao validar certificado. Verifique e Tente novamente.');
    }
}
