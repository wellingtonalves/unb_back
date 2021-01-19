<?php

namespace App\Criteria;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class FiltraPorUsuarioCriteria.
 *
 * @package namespace App\Criteria;
 */
class FiltraPorUsuarioCriteria implements CriteriaInterface
{
    /**
     * Apply criteria in query repository
     *
     * @param string $model
     * @param RepositoryInterface $repository
     *
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository)
    {
        $user = request()->user();
        return $model->where('id_pessoa', $user->pessoa->id_pessoa);
    }
}
