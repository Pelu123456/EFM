<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Contracts\AuthServiceInterface;

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
}
