<?php

namespace App\Repositories\Interfaces;

interface IUserRepository 
{
    public function getAllUsers();

    public function getUserByEmail(string $email);

    public function updateUserByEmail(string $email, array $userDetails);

    public function createUser(array $userDetails);

    public function deleteUserByEmail(string $email);
}