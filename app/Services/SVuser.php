<?php

namespace App\Services;

use App\Models\User;

class SVUser extends BaseService
{
    public function getQuery()
    {
        return User::query();
    }

    public function getByEmail($email)
    {
        $table = $this->getTableName();
        return $this->getQuery()
            ->where($table . '.email', $email)
            ->select($table . '.*')
            ->first();
    }

    public function getTableName()
    {
        $query = $this->getQuery();
        return $query ? $query->getModel()->getTable() : null;
    }

    public function store($params)
    {
        $user = User::create($params);
        return $user;
    }
}