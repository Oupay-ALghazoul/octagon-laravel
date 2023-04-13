<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class PropositionValue extends Model
{
    use Translatable;
    protected $translatable = ['title', 'description'];
    
}
