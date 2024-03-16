<?php

namespace App\Services\Tickets;

use App\Contracts\Abstracts\BaseService;
use App\Repositories\PeriodRepository;
use Exception;
use Iqbalatma\LaravelServiceRepo\Exceptions\EmptyDataException;

class PeriodService extends BaseService
{
    protected $repository;

    public function __construct()
    {
        $this->repository = new PeriodRepository();
        $this->breadcrumbs = [
            "Tickets" => "#",
            "Periods" => route('tickets.periods.index'),
        ];
    }


    /**
     * @return array
     */
    public function getAllData(): array
    {
        return [
            "title" => "Periods",
            "pageTitle" => "Periods",
            "pageSubTitle" => "Periods of ticket",
            "breadcrumbs" => $this->getBreadcrumbs(),
            "periods" => $this->repository->getAllData()
                ->sortBy("start_date")
                ->sortByDesc("is_active")
        ];
    }

    /**
     * @return array
     */
    public function getCreateData(): array
    {
        $this->addBreadCrumbs([
            "Create" => route('tickets.periods.create')
        ]);
        return [
            "title" => "Periods",
            "pageTitle" => "Periods",
            "pageSubTitle" => "Create period of ticket",
            "breadcrumbs" => $this->getBreadcrumbs(),
        ];
    }


    /**
     * @param array $requestedData
     * @return true[]
     */
    public function addNewData(array $requestedData):array
    {
        try{
            $this->repository->addNewData($requestedData);
            $response = [
                "success" => true
            ];
        }catch(Exception $e){
            $response = getDefaultErrorResponse($e);
        }

        return $response;
    }


    /**
     * @param string $id
     * @return array
     */
    public function getEditDataById(string $id) : array
    {
        $this->addBreadCrumbs([
            "Edit" => route("tickets.periods.edit", $id)
        ]);
        try{
            $this->checkData($id);
            $response = [
                "success" => true,
                "period" => $this->getServiceEntity(),
                "breadcrumbs" => $this->getBreadcrumbs(),
                "title" => "Periods",
                "pageTitle" => "Periods",
                "pageSubTitle" => "Edit period of ticket",
            ];
        }catch(EmptyDataException $e){
            $response = $e->getMessage();
        }catch(Exception $e){
            $response = getDefaultErrorResponse($e);
        }

        return $response;
    }


    /**
     * @param string|int $id
     * @param array $requestedData
     * @return true[]
     */
    public function updateDataById(string|int $id, array $requestedData):array
    {
        try{
            $this->checkData($id);
            $this->getServiceEntity()->fill($requestedData)->save();
            $response = [
                "success" => true
            ];
        }catch(EmptyDataException $e){
            $response = $e->getMessage();
        }catch(Exception $e){
            $response = getDefaultErrorResponse($e);
        }

        return $response;
    }
}
