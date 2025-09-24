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

    public function testBase()
    {
        return $this->authService->testBase(); 
    }
    public function testAuth()
    {
        return $this->authService->AuthTest();
    }

    public function store(StoreUserRequest $request)
    {
        return $this->authService->store($request->validated());
    }

    public function login(LoginRequest $request)
    {
        return $this->authService->login($request->validated());
    }
}
