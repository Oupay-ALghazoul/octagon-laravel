<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Founder extends Model
{
    use Translatable;
    protected $translatable = ['name', 'job_title', 'description'];
    
}
