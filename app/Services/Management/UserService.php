<?php

namespace App\Services\Management;

use App\Contracts\Abstracts\BaseService;
use App\Models\User;
use App\Repositories\UserRepository;
use Exception;
use Illuminate\Support\Facades\DB;
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
            "users" => $this->repository->orderColumn("created_at", "DESC")->getAllDataPaginated()
        ];
    }

    /**
     * @return array
     */
    public function getCreateData(): array
    {
        $this->addBreadCrumbs([
            "Create" => route("management.users.create")
        ]);
        return [
            "title" => "Create Users",
            "pageTitle" => "Create Users",
            "pageSubTitle" => "Create new user",
            "roles" => RoleService::getAllRole(),
            "breadcrumbs" => $this->getBreadcrumbs(),
        ];
    }


    /**
     * @param string $id
     * @return true[]
     */
    public function getEditDataById(string $id): array
    {
        $this->addBreadCrumbs([
            "Edit" => route("management.users.edit", $id)
        ]);
        try {
            $this->checkData($id);
            /** @var User $user */
            $user = $this->getServiceEntity();
            $roles = RoleService::getAllRole();

            RoleService::setActiveRole($roles, $user);
            $response = [
                "success" => true,
                "title" => "Edit User",
                "pageTitle" => "Edit Users",
                "pageSubTitle" => "Edit new user",
                "breadcrumbs" => $this->getBreadcrumbs(),
                "roles" => $roles,
                "user" => $user
            ];
        } catch (EmptyDataException $e) {
            $response = $e->getMessage();
        } catch (Exception $e) {
            $response = getDefaultErrorResponse($e);
        }

        return $response;
    }


    /**
     * @param string|int $id
     * @param array $requestedData
     * @return array|true[]
     */
    public function updateDataById(string|int $id, array $requestedData): array
    {
        try {
            $response = [
                "success" => true
            ];

            $this->checkData($id);

            /** @var User $user */
            $user = $this->getServiceEntity();

            DB::beginTransaction();
            $user->fill($requestedData)
                ->save();

            $user->roles()->sync($requestedData["role_ids"] ?? []);

            DB::commit();
        } catch (EmptyDataException $e) {
            DB::rollBack();
            $response = [
                "success" => false,
                "message" => $e->getMessage()
            ];
        } catch (Exception $e) {
            DB::rollBack();
            $response = getDefaultErrorResponse($e);
        }

        return $response;
    }
}
