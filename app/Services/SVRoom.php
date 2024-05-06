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
        $table = Room::find(13259);
        ProcessNewRoom::dispatch($table);
        return "Successfully send";
    }


}