<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class HomeSlide extends Model
{
    use Translatable;
    protected $translatable = ['title', 'sub_title'];
}
