<?php

namespace App\Repositories\Contracts;

interface IUserRepository {

    public function create(array $data);
    public function findByEmail(string $email);
}
