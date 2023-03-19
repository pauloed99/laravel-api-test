<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\IUserRepository;

class UserRepository implements IUserRepository
{
    public function getAllUsers()
    {
        return User::all();
    }

    public function getUserByEmail(string $email)
    {
        return User::where('email', $email)->first();
    }

    public function createUser(array $userDetails)
    {
        return User::create($userDetails);
    }

    public function updateUserByEmail(string $email, array $userDetails)
    {
        User::where('email', $email)->update($userDetails);
    }

    public function deleteUserByEmail(string $email)
    {
        User::where('email', $email)->delete();
    }
}