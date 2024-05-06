<?php

namespace App\Services;

use App\Models\Room;
use App\Mail\SampleEmail;
use App\Jobs\ProcessNewRoom;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class SVRoom extends BaseService
{
    public function getRoom($params)
    {
        $room = DB::table('rooms')->get();
        return $room;
    }

    public function create($params)
    {
        // $room_queue = new ProcessNewRoom($params);
        // dispatch($room_queue);
        $name = "Funny Coder";
        // dd(new SampleEmail($name));
        Mail::to('rahweekh@gmail.com')->send(new SampleEmail($name));
        return "Mail is sent";
    }


}