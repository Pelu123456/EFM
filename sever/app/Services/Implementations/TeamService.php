<?php

namespace App\Services\Implementations;

// use App\Services\Contracts\Impplementation;

class TeamService extends BaseService
{
    protected TeamRepository $userRepository;

    public function __construct(TeamRepository $teamRepository)
    {
        parent::__construct($teamRepository);
        $this->teamRepository = $teamRepository;
    }

}
