<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class CountriesRepresentative extends Model
{
    use Translatable;
    protected $translatable = ['name', 'description'];
    
}
