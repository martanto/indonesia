<?php

namespace Martanto\Indonesia\Models\Indonesia;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class IndonesiaProvince extends Model
{
    /**
     * Get cities
     */
    public function cities(): HasMany
    {
        return $this->hasMany(
            related: IndonesiaCity::class,
            foreignKey: 'code_province',
            localKey: 'code'
        );
    }

    /**
     * Get districts through cities
     */
    public function districts(): HasManyThrough
    {
        return $this->hasManyThrough(
            related: IndonesiaDistrict::class,
            through: IndonesiaCity::class,
            firstKey: 'code_province',
            secondKey: 'code_city',
            localKey: 'code',
            secondLocalKey: 'code'
        );
    }
}
