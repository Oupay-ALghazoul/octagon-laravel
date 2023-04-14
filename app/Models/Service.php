<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use TCG\Voyager\Traits\Translatable;

class Service extends Model
{
    use Translatable;
    protected $translatable = ['name', 'description'];
    
    public function subCategories(): HasMany
    {
        return $this->hasMany(SubCategory::class);
    }
    
}
