<?php
namespace App\Services\Contracts;
use App\Services\Contracts\BaseServiceInterface;

interface AuthServiceInterface extends BaseServiceInterface
{
    public function login(array $data);
    public function authTest();
    public function logout();
    public function refresh();
}
