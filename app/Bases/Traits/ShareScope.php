<?php

namespace App\Bases\Traits;

use Illuminate\Support\Facades\DB;

Trait ShareScope
{
    
    /**
     * Get random model
     */
    public function scopeRandom($query)
    {
        return $query->orderByRaw('RAND()')->first();
    }

}
