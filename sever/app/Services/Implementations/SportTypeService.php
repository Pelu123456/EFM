<?php

namespace App\Services\Implementations;

use App\Services\Implementations\BaseService;
use App\Repositories\Eloquent\SportTypeRepository;

class SportTypeService extends BaseService
{
    protected SportTypeRepository $SportTypeRepository;

    public function __construct(SportTypeRepository $SportTypeRepository)
    {
        parent::__construct($SportTypeRepository);
        $this->SportTypeRepository = $SportTypeRepository;
    }

}
