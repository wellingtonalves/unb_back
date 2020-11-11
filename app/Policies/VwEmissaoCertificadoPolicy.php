<?php

namespace App\Policies;

use App\Models\Usuario;

class VwEmissaoCertificadoPolicy extends AbstractPolicy
{

    /**
     * @param Usuario $usuario
     * @return bool
     */
    public function index(Usuario $usuario)
    {
        return self::check('VW_EMISSAO_CERTIFICADO_LISTAR', $usuario);
    }

}
