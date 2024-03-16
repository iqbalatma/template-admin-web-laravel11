<?php

namespace App\Services\Order;
use App\Contracts\Abstracts\BaseService;
use App\Repositories\PeriodRepository;

class OrderService extends BaseService
{
    /**
     * @return string[]
     */
    public function getCreateData():array
    {
        return [
            "title" => "Order",
            "pageTitle" => "Order Ticket",
            "periods" => PeriodRepository::getActive()
        ];
    }
}
