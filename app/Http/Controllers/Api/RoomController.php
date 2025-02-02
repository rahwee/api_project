<?php

namespace App\Http\Controllers\Api;

use App\Models\Room;
use App\Services\SVRoom;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\RoomResource;
use App\Http\Requests\PostRoomRequest;
use Throwable;

class RoomController extends BaseApi
{
    public function getService()
    {
        return new SVRoom();
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try{
            $data = $this->getService()->getRoom($request->all());
            return $this->respondSuccess($data);
        }catch(\Throwable $e){
            return $this->respondError($e);
        }
        $data = RoomResource::collection(Room::all());
        return $this->respondSuccess($data);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRoomRequest $request)
    {
        try{
            $params = $request->all();
            $data   = $this->getService()->create($params);
            return $this->respondSuccess($data);
        }catch(Throwable $e){
            return $this->respondError($e);
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
