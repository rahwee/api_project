<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostUserRequest;
use App\Services\SVUser;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getService()
    {
        return new SVUser;
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
