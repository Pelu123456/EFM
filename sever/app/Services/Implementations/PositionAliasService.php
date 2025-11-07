<?php

namespace App\Services\Implementations;

// use App\Services\Contracts\Implementation\BaseService;
use App\Repositories\Eloquent\PositionAliasRepository;

class PositionAliasService extends BaseService
{
    protected PositionAliasRepository $positionAliasRepository;

    public function __construct(PositionAliasRepository $positionAliasRepository)
    {
        parent::__construct($positionAliasRepository);
        $this->positionAliasRepository = $positionAliasRepository;
    }

}
