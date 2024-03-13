<?php

namespace App\Contracts\Abstracts;

abstract class BaseService extends \Iqbalatma\LaravelServiceRepo\BaseService {
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
}
