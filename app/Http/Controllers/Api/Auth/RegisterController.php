<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\CreateUserRequest;
use App\Services\UserService;

class RegisterController extends Controller
{
    protected $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function create(CreateUserRequest $request)
    {
        return $this->userService->create($request->all());
    }
}
