<?php

namespace App\Repository;

use App\Models\User;

class UserRepository
{
    private User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function create($attributes)
    {
        return $this->user->create($attributes);
    }

    public function insert(array $values)
    {
        return $this->user->insert($values);
    }

    public function findByName(array $names)
    {
        return $this->user::where(['name' => $names])->firstOrFail();
    }

    public function findUserByVerifyCode($verify_code)
    {
        return $this->user::where(['verify_code' => $verify_code])->firstOrFail();
    }
}
