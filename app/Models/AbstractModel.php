<?php

namespace App\Models;

use AlexAlexandre\MappableModels\Traits\HasNestedAttributes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

abstract class AbstractModel extends Model
{
    use HasNestedAttributes;
//    use SoftDeletes;

    protected $hidden = [ 'pivot'];
}
