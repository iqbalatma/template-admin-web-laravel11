<?php

namespace App\Http\Controllers\Tickets;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tickets\Periods\StorePeriodRequest;
use App\Http\Requests\Tickets\Periods\UpdatePeriodRequest;
use App\Services\Tickets\PeriodService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PeriodController extends Controller
{
    /**
     * @param PeriodService $service
     * @return Response
     */
    public function index(PeriodService $service): Response
    {
        viewShare($service->getAllData());
        return response()->view("tickets.periods.index");
    }


    /**
     * @param PeriodService $service
     * @return Response
     */
    public function create(PeriodService $service): Response
    {
        viewShare($service->getCreateData());

        return response()->view("tickets.periods.create");
    }


    /**
     * @param PeriodService $service
     * @param StorePeriodRequest $request
     * @return RedirectResponse
     */
    public function store(PeriodService $service, StorePeriodRequest $request): RedirectResponse
    {
        $response = $service->addNewData($request->validated());

        if ($this->isError($response)) return $this->getErrorResponse();

        return redirect()->route('tickets.periods.index')->with("success", "Add new period successfully");
    }


    /**
     * @param PeriodService $service
     * @param string $id
     * @return Response|RedirectResponse
     */
    public function edit(PeriodService $service, string $id): Response|RedirectResponse
    {
        $response = $service->getEditDataById($id);
        if ($this->isError($response)) return $this->getErrorResponse();
        viewShare($response);
        return response()->view("tickets.periods.edit");
    }


    /**
     * @param PeriodService $service
     * @param UpdatePeriodRequest $request
     * @param string $id
     * @return RedirectResponse
     */
    public function update(PeriodService $service, UpdatePeriodRequest $request, string $id): RedirectResponse
    {
        $response = $service->updateDataById($id, $request->validated());
        if ($this->isError($response)) return $this->getErrorResponse();

        return redirect()->route('tickets.periods.index')->with("success", "Update period successfully");
    }
}
