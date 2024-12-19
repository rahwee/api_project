<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\BaseApi;
use App\Http\Requests\PostUserRequest;
use App\Services\SVUser;
use Illuminate\Http\Request;

class UserController extends BaseApi
{
    public function getService()
    {
        return new SVUser;
    }

    public function index(Request $request)
    {
        $params = $request->all();
        $data = $this->getService()->getUser($params);
        return $this->respondSuccess($data);
    }

    public function store(PostUserRequest $request)
    {
        try{
            $params = $request->all();
            $data = $this->getService()->store($params);
            return $data;
        }catch(\Throwable $e){
            return $e;
        }
    }
}
