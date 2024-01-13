<?php

namespace Martanto\Indonesia;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Cache;
use Martanto\Indonesia\Models\Indonesia\IndonesiaCity;
use Martanto\Indonesia\Models\Indonesia\IndonesiaDistrict;
use Martanto\Indonesia\Models\Indonesia\IndonesiaProvince;
use Martanto\Indonesia\Models\Indonesia\IndonesiaVillage;

class Indonesia
{
    public bool $cache = true;

    public string $cachePrefix = 'indonesia';

    public function __construct(
        protected IndonesiaProvince $province,
        protected IndonesiaCity $city,
        protected IndonesiaDistrict $district,
        protected IndonesiaVillage $village
    ) {
    }

    /**
     * Set cache to be used or not
     *
     * @return $this
     */
    public function cache(bool $cache): self
    {
        $this->cache = $cache;

        return $this;
    }

    /**
     * Prefix cache
     *
     * @return $this
     */
    public function cachePrefix(string $cachePrefix): self
    {
        $this->cachePrefix = $cachePrefix;

        return $this;
    }

    /**
     * Get Indonesia Province model
     */
    public function province(): IndonesiaProvince
    {
        return $this->province;
    }

    /**
     * Get Indonesia province by province code
     */
    public function provinceByCode(string|int $code): Model|static
    {
        return $this->province->byCode($code)->firstOrFail();
    }

    /**
     * Get all Indonesia provinces
     */
    public function allProvinces(): Collection
    {
        return $this->cache ? Cache::rememberForever(
            key: "{$this->cachePrefix}_all_provinces",
            callback: fn () => $this->province->all()
        ) : $this->province->all();
    }

    public function provinceWithCities()
    {
        return $this->cache ? Cache::rememberForever(
            key: "{$this->cachePrefix}_province_with_cities",
            callback: fn () => $this->province->with('cities')->get()
        ) : $this->province->with('cities')->get();
    }

    public function provinceWithDistricts()
    {
        return $this->cache ? Cache::rememberForever(
            key: "{$this->cachePrefix}_province_with_districts",
            callback: fn () => $this->province->with('districts')->get()
        ) : $this->province->with('districts')->get();
    }

    /**
     * Paginate Indonesia province result
     */
    public function paginateProvinces(int $page = 15): LengthAwarePaginator
    {
        return $this->province->paginate($page);
    }
}
