<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Services\Order\OrderService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OrderController extends Controller
{
    /**
     * @param OrderService $service
     * @return Response
     */
    public function create(OrderService $service):Response
    {
        $response = $service->getCreateData();

        viewShare($response);
        return response()->view("order.orders.create");
    }
}
