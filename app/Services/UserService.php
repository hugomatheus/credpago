<?php

namespace App\Services;

use App\Repositories\Contracts\IUserRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserService
{
    protected $userRepository;
    public function __construct(IUserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function create(array $data)
    {
        return $this->userRepository->create($data);
    }

    public function auth(array $data)
    {
        $user = $this->userRepository->findByEmail($data['email']);

        if (!$user || !Hash::check($data['password'], $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        $token = $user->createToken($data['email'])->plainTextToken;
        return response()->json(['token' => $token]);
    }
}
