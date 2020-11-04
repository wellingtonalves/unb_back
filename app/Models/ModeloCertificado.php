<?php

namespace App\Models;

use App\Models\Domain\TipoOferta;

class ModeloCertificado extends AbstractModel
{

    protected $table = 'tb_modelo_certificado';
    protected $primaryKey = 'id_modelo_certificado';

    protected $fillable = [];
}
