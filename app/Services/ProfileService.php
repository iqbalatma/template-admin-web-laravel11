<?php

namespace App\Services;
use App\Contracts\Abstracts\BaseService;
use App\Models\User;
use App\Repositories\UserRepository;
use Exception;
use Illuminate\Support\Facades\Hash;
use Iqbalatma\LaravelServiceRepo\Exceptions\EmptyDataException;

class ProfileService extends BaseService
{
    protected $repository;

    public function __construct()
    {
         $this->repository = new UserRepository();
    }


    /**
     * @param string|int $id
     * @return array
     */
    public function getEditDataById(string|int $id):array
    {
        try{
            $this->checkData($id);

            $response = [
                "success" => true,
                "title" => "Edit Profile",
                "pageTitle" => "Edit Profile",
                "pageSubTitle" => "Edit your profile",
                "user" => $this->getServiceEntity()
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
     * @return array
     */
    public function updateDataById(string|int $id, array $requestedData): array
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
     * @param string $id
     * @param string $oldPassword
     * @param string $newPassword
     * @return true[]
     */
    public function updatePassword(string $id, string $oldPassword, string $newPassword):array
    {
        try{
            $this->checkData($id);

            /** @var User $user */
            $user = $this->getServiceEntity();

            if (!Hash::check($oldPassword, $user->password)){
                return [
                    "success" => false,
                    "message" => "Your old password is invalid"
                ];
            };

            $user->password = $newPassword;
            $user->save();

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
