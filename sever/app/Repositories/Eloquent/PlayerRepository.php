<?php
namespace App\Repositories\Eloquent;

use App\Repositories\Eloquent\BaseRepository;
use App\Models\User;

class PlayerRepository extends BaseRepository
{

    public function __construct(Player $model)
    {
        parent::__construct($model);
    }

}
