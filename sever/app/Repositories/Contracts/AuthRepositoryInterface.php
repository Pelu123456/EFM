<?php
namespace App\Repositories\Contracts;
use App\Repositories\Contracts\AuthRepositoryInterface;

interface AuthRepositoryInterface extends BaseRepositoryInterface
{
    public function authTest();
}
