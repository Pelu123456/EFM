<?php
namespace App\Services\Contracts;
use App\Services\Contracts\BaseServiceInterface;

interface AuthServiceInterface extends BaseServiceInterface
{
    // public function Login(Request $request);
    public function authTest();
}
