<?php

namespace App\Services\Implementations;

// use App\Services\Contracts\Impplementation;

class UserService extends BaseService
{
    protected UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        parent::__construct($userRepository);
        $this->userRepository = $userRepository;
    }

}
