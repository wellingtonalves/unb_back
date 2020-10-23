<?php

namespace App\Policies;

use App\Models\Usuario;

class VwValidacaoCertificadoPolicy extends AbstractPolicy
{

    /**
     * @param Usuario $usuario
     * @return bool
     */
    public function show(Usuario $usuario)
    {
        return self::check('VW_VALIDACAO_CERTIFICADO_DETALHAR', $usuario);
    }

}
