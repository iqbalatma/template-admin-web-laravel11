<?php

namespace App\Contracts\Abstracts;

use App\Contracts\Interfaces\DeletableRelationCheck;
use App\Exceptions\EntityStillInUseException;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Iqbalatma\LaravelServiceRepo\Exceptions\EmptyDataException;

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
     * @param DeletableRelationCheck $entity
     * @return void
     * @throws EntityStillInUseException
     */
    protected function checkIsEligibleToDelete(DeletableRelationCheck $entity): void
    {
        foreach ($entity->getRelationCheckBeforeDelete() as $relation){
            if ($entity->{$relation}()->exists()){
                throw new EntityStillInUseException("Cannot delete this entity because still in use");
            }
        }
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
     * @param array $requestedData
     * @return true[]
     */
    public function addNewData(array $requestedData): array
    {
        try {
            $this->repository->addNewData($requestedData);
            $response = [
                "success" => true
            ];
        } catch (Exception $e) {
            $response = getDefaultErrorResponse($e);
        }

        return $response;
    }


    /**
     * @param string|int $id
     * @return true[]
     */
    public function deleteDataById(string|int $id): array
    {
        try {
            $response = [
                "success" => true
            ];
            $this->checkData($id);

            $entity = $this->getServiceEntity();

            $this->checkIsEligibleToDelete($entity);

            $entity->delete();
        } catch (EntityStillInUseException|EmptyDataException $e) {
            $response = [
                "success" => false,
                "message" => $e->getMessage(),
            ];
        } catch (Exception $e) {
            $response = getDefaultErrorResponse($e);
        }

        return $response;
    }
}
