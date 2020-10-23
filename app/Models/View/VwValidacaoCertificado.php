<?php

namespace App\Models\View;

use Illuminate\Database\Eloquent\Model;

class VwValidacaoCertificado extends Model
{
//    TODO - testar se consigo passar um array de conexções, para manipular na service.
//    protected $connection = 'ESAF';

    /**
     * @var string
     */
    public $table = 'vw_validacao_certificado';

    /**
     * @var string
     */
    protected $primaryKey = 'codigo_certificado';
}
