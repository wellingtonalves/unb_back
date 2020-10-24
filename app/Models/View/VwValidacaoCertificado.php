<?php

namespace App\Models\View;

use Illuminate\Database\Eloquent\Model;

class VwValidacaoCertificado extends Model
{

    /**
     * @var string
     */
    public $table = 'vw_validacao_certificado';

    /**
     * @var string
     */
    protected $primaryKey = 'codigo_certificado';

    /**
     * @var array
     */
    protected $appends = [
        'tx_origem'
    ];

    /**
     * @return string|null
     */
    public function getTxOrigemAttribute()
    {
        return $this->connection;
    }

}
