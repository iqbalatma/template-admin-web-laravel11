<?php

namespace App\Repositories;
use Illuminate\Support\Collection;
use Iqbalatma\LaravelServiceRepo\BaseRepository;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Period;

class PeriodRepository extends BaseRepository
{

     /**
     * use to set base query builder
     * @return Builder
     */
    public function getBaseQuery(): Builder
    {
        return Period::query();
    }

    /**
     * use this to add custom query on filterColumn method
     * @return void
     */
    public function applyAdditionalFilterParams(): void
    {
    }


    /**
     * @return Collection
     */
    public static function getActive(): Collection
    {
        return self::init()
            ->where("is_active")
            ->get();
    }
}
