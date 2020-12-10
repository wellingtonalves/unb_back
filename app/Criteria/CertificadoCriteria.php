<?php

namespace App\Criteria;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class CertificadoCriteria.
 *
 * @package namespace App\Criteria;
 */
class CertificadoCriteria implements CriteriaInterface
{
    /**
     * Apply criteria in query repository
     *
     * @param string              $model
     * @param RepositoryInterface $repository
     *
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository)
    {
        $user = request()->user();
        return $model->whereHas('pessoa', function ($query) use($user){
            $query->where('id_pessoa', $user->id_usuario);
        });
    }
}
