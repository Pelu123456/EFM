<?php

namespace App\Services\Implementations;

use App\Repositories\Eloquent\PositionRepository;

class PositionService extends BaseService
{
    protected PositionRepository $positionRepository;

    public function __construct(PositionRepository $positionRepository)
    {
        parent::__construct($positionRepository);
        $this->positionRepository = $positionRepository;
    }

}
