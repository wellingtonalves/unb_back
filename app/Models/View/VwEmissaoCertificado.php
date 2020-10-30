<?php

namespace App\Models\View;

use Illuminate\Database\Eloquent\Model;

class VwEmissaoCertificado extends Model
{

//    protected $connection = 'suap';

    /**
     * @var string
     */
    public $table = 'vw_emissao_certificado';

    /**
     * @var string
     */
    protected $primaryKey = 'id_certificado';

}
