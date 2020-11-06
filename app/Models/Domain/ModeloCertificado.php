<?php

namespace App\Models\Domain;

use App\Models\AbstractModel;

class ModeloCertificado extends AbstractModel
{

    protected $table = 'tb_modelo_certificado';
    protected $primaryKey = 'id_modelo_certificado';

    protected $fillable = [];
}
