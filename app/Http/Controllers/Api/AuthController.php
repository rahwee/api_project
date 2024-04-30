<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Jwt\AppManagerLogin;


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
}
