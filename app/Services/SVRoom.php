<?php

namespace App\Services;

use App\Http\Tools\ParamTools;
use App\Models\Room;

class SVRoom extends BaseService
{
    public function getQuery()
    {
        return new Room();
    }
    public function getRoom($params)
    {
        $search = ParamTools::get_value($params, 'search');
        $sort   = ParamTools::get_value($params, 'sort', 'name');
        $order  = ParamTools::get_value($params, 'name', 'DESC');
        $limit  = ParamTools::get_value($params, 'limit', 10);

        $query   = $this->getQuery()
                        ->select(
                            'global_id',
                            'name',
                            'capacity',
                            'status'
                        );

        if(!empty($search)){
            $query->where('name', 'LIKE', '%' . $search . '%')
                ->orWhere('status', 'LIKE', '%'.$search.'%');
        }
        
        $query->orderBy($sort, $order);
        $room = $query->paginate($limit);
        return $room;
    }

    public function create($params)
    {
        $params['global_id'] = getUuid();
        // dd($params);
        $this->getQuery()
                ->create($params);
        return "Room is successfully created.";
    }


}