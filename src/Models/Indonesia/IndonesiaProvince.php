<?php

namespace Martanto\Indonesia\Models\Indonesia;

use Illuminate\Database\Eloquent\Relations\HasMany;

class IndonesiaProvince extends Model
{
    /**
     * @return HasMany
     */
    public function cities()
    {
        return $this->hasMany(
            related: IndonesiaCity::class,
            foreignKey: 'code_province',
            localKey: 'code'
        );
    }

    public function districts()
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
