<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use TCG\Voyager\Traits\Translatable;

class V2Service extends Model
{
    use Translatable;
    protected $translatable = ['title', 'description'];
    
}
