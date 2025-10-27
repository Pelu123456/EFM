<?php

namespace App\Services\Implementations;

// use App\Services\Contracts\Impplementation;

class PlayerService extends BaseService
{
    protected PlayerRepository $playerRepository;

    public function __construct(PlayerRepository $playerRepository)
    {
        parent::__construct($playerRepository);
        $this->playerRepository = $playerRepository;
    }

}
