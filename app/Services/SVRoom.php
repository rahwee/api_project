<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class SVRoom extends BaseService
{
    public function getRoom($params)
    {
        $room = DB::table('rooms')->get();
        return $room;
    }
}