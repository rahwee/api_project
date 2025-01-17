<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\BaseApi;
use App\Http\Requests\PostUserRequest;
use App\Services\SVUser;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class UserController extends BaseApi
{
    /**
     * Get an instance of the service.
     *
     * @return SVUser
     */
    public function getService()
    {
        return new SVUser;
    }

    /**
     * Get list of users.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $params = $request->all();
        $data = $this->getService()->getUser($params);
        return $this->respondSuccess($data);
    }

    /**
     * Store a newly created user in storage.
     *
     * @param PostUserRequest $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateMe(Request $request)
    {
        try{
            $params = $request->all();
            $data = $this->getService()->updateMe($params);
            return $this->respondSuccess($data);
        }catch(\Throwable $e){
            return $e;
        }
    }

    public function destroy($id)
    {
        try{
            $data = $this->getService()->destroy($id);
            return $this->respondSuccess($data);
        }catch(\Throwable $e){
            return $this->respondError($e);
        }
    }
}
