<?php

namespace Martanto\Indonesia\Traits;

use Illuminate\Database\Eloquent\Builder;

trait HasScope
{
    /**
     * Get model by scope
     */
    public function scopeByCode(Builder $query, string $code): void
    {
        $query->where('code', $code);
    }
}
