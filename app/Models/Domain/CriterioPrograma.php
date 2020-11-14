<?php

namespace App\Models\Domain;

use App\Models\AbstractModel;

class CriterioPrograma extends AbstractModel
{
    protected $table        = 'tb_criterio_programa';
    protected $primaryKey   = 'id_criterio';

    public $incrementing = false;

    protected $fillable = [];
}
