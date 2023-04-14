<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use TCG\Voyager\Traits\Translatable;

class SubCategory extends Model
{
    use Translatable;
    protected $translatable = ['title', 'description'];
    
    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }
    
}
