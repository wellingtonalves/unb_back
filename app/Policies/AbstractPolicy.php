<?php

namespace App\Policies;

use App\Helpers\Constants;

abstract class AbstractPolicy
{
    /**
     * @param $permission
     * @param $user
     * @return bool
     */
    public function check($permission, $user)
    {
        // se o usuário for um admin, ele automaticamente tem todas as permissões.
        if ($user->id_perfil === Constants::PERFIS['ADMIN']) {
            return true;
        }

        return in_array($permission, array_column($user->perfil->permissao->toArray(), 'tx_nome_permissao'));
    }
}
