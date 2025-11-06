<?php
namespace App\Repositories\Eloquent;

use App\Repositories\Eloquent\BaseRepository;
use App\Models\SportType;

class SportTypeRepository extends BaseRepository
{
    public function __construct(SportType $model)
    {
        parent::__construct($model);
    }

}
