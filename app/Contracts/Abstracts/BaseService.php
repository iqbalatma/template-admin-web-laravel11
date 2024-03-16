<?php

namespace App\Contracts\Abstracts;

use App\Exceptions\EntityStillInUseException;
use Illuminate\Database\Eloquent\Model;

abstract class BaseService extends \Iqbalatma\LaravelServiceRepo\BaseService
{
    protected array $breadcrumbs;

    /**
     * Use to get all data breadcrumbs
     *
     * @return array
     */
    protected function getBreadcrumbs(): array
    {
        return $this->breadcrumbs;
    }

    /**
     * Use to add new breadcrumb
     *
     * @param array $newBreadcrumbs
     * @return void
     */
    protected function addBreadCrumbs(array $newBreadcrumbs): void
    {
        foreach ($newBreadcrumbs as $key => $breadcrumb) {
            $this->breadcrumbs[$key] = $breadcrumb;
        }
    }

    /**
     * @param Model $entity
     * @return void
     * @throws EntityStillInUseException
     */
    protected function checkIsEligibleToDelete(Model $entity): void
    {
        foreach ($entity->relationCheckBeforeDelete ?? [] as $relation){
            if ($entity->{$relation}()->exists()){
                throw new EntityStillInUseException("Cannot delete this entity because still in use");
            }
        }
    }
}
