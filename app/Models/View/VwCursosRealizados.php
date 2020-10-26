<?php

namespace App\Models\View;

use Illuminate\Database\Eloquent\Model;

class VwCursosRealizados extends Model
{

    protected $connection = 'esaf';

    /**
     * @var string
     */
    public $table = 'vw_cursos_realizados';

}
