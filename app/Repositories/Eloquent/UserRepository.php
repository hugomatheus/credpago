<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\Contracts\IUserRepository;

class UserRepository implements IUserRepository
{
    protected $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function create(array $data)
    {
        $data['password'] = bcrypt($data['password']);
        return $this->user->create($data);
    }

    public function findByEmail(string $email)
    {
        return $this->user->where('email', $email)->first();
    }

}
