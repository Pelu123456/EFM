<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Contracts\AuthServiceInterface;
use App\Http\Requests\Auth\StoreUserRequest;
use App\Http\Requests\Auth\LoginRequest;


class AuthController extends Controller
{
    protected AuthServiceInterface $authService;

    public function __construct(AuthServiceInterface $authService)
    {
        $this->authService = $authService;
    }

    public function register(StoreUserRequest $request)
    {
        $validatedData = $request->validated();
        return $this->authService->store($validatedData);
    }

    public function login(LoginRequest $request)
    {
        $validatedData = $request->validated();
        return $this->authService->login($validatedData);
    }

    public function logout(Request $request)
    {
        return $this->authService->logout($request);
    }
}
