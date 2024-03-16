<?php

namespace App\Services\Management;

use App\Contracts\Abstracts\BaseService;
use App\Repositories\UserRepository;
use Exception;
use Iqbalatma\LaravelServiceRepo\Exceptions\EmptyDataException;

class UserService extends BaseService
{
    protected $repository;

    public function __construct()
    {
        $this->repository = new UserRepository();
        $this->breadcrumbs = [
            "Management" => "#",
            "Users" => route('management.users.index')
        ];
    }

    /**
     * @return array
     */
    public function getAllDataPaginated(): array
    {
        return [
            "title" => "Users",
            "pageTitle" => "Users",
            "pageSubTitle" => "List all data user",
            "breadcrumbs" => $this->getBreadcrumbs(),
            "users" => $this->repository->getAllDataPaginated()
        ];
    }

    /**
     * @return array
     */
    public function getCreateData():array
    {
        $this->addBreadCrumbs([
            "Create" => route("management.users.create")
        ]);
        return [
            "title" => "Create Users",
            "pageTitle" => "Create Users",
            "pageSubTitle" => "Create new user",
            "breadcrumbs" => $this->getBreadcrumbs(),
        ];
    }


    /**
     * @param array $requestedData
     * @return true[]
     */
    public function addNewData(array $requestedData):array
    {
        try {
            $this->repository->addNewData($requestedData);

            $response = [
                "success" => true
            ];
        }catch (Exception $e){
            $response = getDefaultErrorResponse($e);
        }

        return $response;
    }


    /**
     * @param string $id
     * @return true[]
     */
    public function getEditDataById(string $id):array
    {
        $this->addBreadCrumbs([
            "Edit" => route("management.users.edit", $id)
        ]);
        try{
            $this->checkData($id);
            $response = [
                "success" => true,
                "title" => "Edit User",
                "pageTitle" => "Edit Users",
                "pageSubTitle" => "Edit new user",
                "breadcrumbs" => $this->getBreadcrumbs(),
                "user" => $this->getServiceEntity(),
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

            $this->getServiceEntity()
                ->fill($requestedData)
                ->save();
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


    /**
     * @param string|int $id
     * @return true[]
     */
    public function deleteDataById(string|int $id):array
    {
        try{
            $this->checkData($id);

            $this->getServiceEntity()->delete();
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
