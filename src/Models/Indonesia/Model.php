<?php

namespace Martanto\Indonesia\Models\Indonesia;

use Illuminate\Database\Eloquent\Model as BaseModel;
use Martanto\Indonesia\Traits\HasScope;

class Model extends BaseModel
{
    use HasScope;

    public $timestamps = false;
}
