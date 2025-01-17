<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\Jwt\AppManagerLogin;

use function PHPSTORM_META\type;

class AuthController extends BaseApi
{
    public function getService()
    {
        return new AppManagerLogin();
    }

    public function login(Request $request)
    {
        try{
            $token = $this->getService()->authenticateAndGetToken($request->all());
            return $this->respondSuccess($token);
        }catch(\Throwable $e){
            return $this->respondError($e);
        }
    }

    public function register(Request $request)
    {
        try{
            $params = $request->all();
            $data = $this->getService()->register($params);
            return $this->respondSuccess($data);
        }catch(\Throwable $e){
            return $this->respondError($e);
        }
    }

    public function verify(Request $request)
    {
        try{
            $params = $request->all();
            $data = $this->getService()->verify($params);
            return $this->respondSuccess($data);
        }catch(\Throwable $e){
            return $this->respondError($e);
        }
    }

    public function meInfo()
    {
        try{
            $data = $this->getService()->meInfo();
            return $this->respondSuccess($data);
        }catch(\Throwable $e){
            return $this->respondError($e);
        }
    }
}
