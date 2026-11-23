<?php

namespace App\Services;

use App\Models\User\User;

class UserService
{
    // 1) GET — fetch all
    public function getAll()
    {
        return User::where('usr_role', 'user')->get();
    }

    // 2) POST — create
    public function create(array $data)
    {
        return User::create($data);
    }

    // 3) PUT — update
    public function update(string $id, array $data)
    {
        $user = User::findOrFail($id);

        $user->update($data);

        return $user;
    }

    // 4) DELETE — delete
    public function delete(string $id)
    {
        $user = User::findOrFail($id);

        return $user->delete();
    }
}