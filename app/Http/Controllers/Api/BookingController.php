<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Services\SVGateway;
use Illuminate\Http\Request;

class BookingController extends BaseApi
{
    public function getService()
    {
        return new SVGateway();
    }

    public function getCheckOutSession(Request $request, $roomId)
    {
        try{
            $data = $this->getService()->getCheckOutSession($request, $roomId);
            return $this->respondSuccess($data);
        }catch(\Throwable $e){
            return $this->respondError($e);
        }
        
    }
}
