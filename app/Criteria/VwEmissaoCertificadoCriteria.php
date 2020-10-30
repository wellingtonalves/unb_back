<?php

namespace App\Criteria;

use App\Exceptions\VwCursosRealizadosException;
use App\Exceptions\VwEmissaoCertificadoException;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;
use Prettus\Repository\Criteria\RequestCriteria;

/**
 * Class VwEmissaoCertificadoCriteria
 * @package App\Criteria
 */
class VwEmissaoCertificadoCriteria extends RequestCriteria implements CriteriaInterface
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

        if (empty($searchFields['id_certificado']) || empty($searchFields['tx_origem'])) {
            new VwEmissaoCertificadoException();
        }

        return $model->getModel()->setConnection($searchFields['tx_origem']);
    }
}
