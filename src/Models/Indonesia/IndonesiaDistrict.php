<?php

namespace Martanto\Indonesia\Models\Indonesia;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class IndonesiaDistrict extends Model
{
    public function city(): BelongsTo
    {
        return $this->belongsTo(
            related: IndonesiaCity::class,
            foreignKey: 'code_city',
            ownerKey: 'code'
        );
    }

    public function districts(): HasMany
    {
        return $this->hasMany(
            related: IndonesiaVillage::class,
            foreignKey: 'code_district',
            localKey: 'code'
        );
    }
}
