<?php

namespace App\Repositories;

use Illuminate\Support\Collection;
use Iqbalatma\LaravelServiceRepo\BaseRepository;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Menu;

class MenuRepository extends BaseRepository
{

    /**
     * use to set base query builder
     * @return Builder
     */
    public function getBaseQuery(): Builder
    {
        return Menu::query();
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
    public static function getAllTopLevelMenuWithChildren(): Collection
    {
        return self::init()->whereNull("parent_id")
            ->with("children")
            ->get();
    }
}
