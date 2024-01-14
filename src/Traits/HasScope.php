<?php

namespace Martanto\Indonesia\Traits;

use Illuminate\Database\Eloquent\Builder;

trait HasScope
{
    /**
     * Get model by scope
     *
     * @param Builder $query
     * @param string $code
     * @return void
     */
    public function scopeByCode(Builder $query, string $code): void
    {
        $query->where('code', $code);
    }
}
