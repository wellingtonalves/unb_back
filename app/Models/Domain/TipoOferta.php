<?php

namespace App\Models\Domain;

use App\Models\AbstractModel;

class TipoOferta extends AbstractModel
{
    protected $table        = 'tb_tipo_oferta';
    protected $primaryKey   = 'id_tipo_oferta';
    public $incrementing = false;

    protected $fillable = [];
}
