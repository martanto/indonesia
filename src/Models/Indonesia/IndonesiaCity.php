<?php

namespace Martanto\Indonesia\Models\Indonesia;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class IndonesiaCity extends Model
{
    public function province(): BelongsTo
    {
        return $this->belongsTo(
            related: IndonesiaProvince::class,
            foreignKey: 'code_province',
            ownerKey: 'code'
        );
    }

    public function districts(): HasMany
    {
        return $this->hasMany(
            related: IndonesiaDistrict::class,
            foreignKey: 'code_city',
            localKey: 'code'
        );
    }

    public function villages(): HasManyThrough
    {
        return $this->hasManyThrough(
            related: IndonesiaVillage::class,
            through: IndonesiaDistrict::class,
            firstKey: 'code_city',
            secondKey: 'code_district',
            localKey: 'code',
            secondLocalKey: 'code'
        );
    }
}
