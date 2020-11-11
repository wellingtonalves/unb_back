<?php

namespace App\Criteria;

use App\Exceptions\VwCursosRealizadosException;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;
use Prettus\Repository\Criteria\RequestCriteria;

/**
 * Class VwCursosRealizadosCriteria
 * @package App\Criteria
 */
class VwCursosRealizadosCriteria extends RequestCriteria implements CriteriaInterface
{

    /**
     * @param Builder|Model $model
     * @param RepositoryInterface $repository
     * @return Builder|Model|mixed
     */
    public function apply($model, RepositoryInterface $repository)
    {
        $searchFields = $this->request->get('search');
        $searchFields = $this->parserSearchData($searchFields);

        if (empty($searchFields['nr_cpf']) && empty($searchFields['tx_email'])) {
            new VwCursosRealizadosException();
        }

        return $model;
    }
}
