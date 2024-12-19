<?php

namespace App\Services;

use App\Models\User;
use App\Http\Tools\ParamTools;

use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\table;

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
            ->whereNotNull($table. '.email_verified_at')
            ->select($table . '.*')
            ->first();
    }

    public function getTableName()
    {
        $query = $this->getQuery();
        return $query ? $query->getModel()->getTable() : null;
    }

    public function getUser($params)
    {
        $limit = ParamTools::get_value($params, 'limit', 5);

        $users = DB::table('users')
            ->select(
                'id',
                'name',
                'email'
            )
            ->paginate($limit);
        return $users;
    }

    public function store($params)
    {
        $user = User::create($params);
        return $user;
    }

    public function update($params, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return throw new \Exception('User not found');
        }

        $user->update($params);
        return $user->name;
    }

    public function destroy($id)
    {
        $user = User::find($id);
        if (!$user) {
            return throw new ('User not found');
        }
        $user->delete();
        return true;
    }
}