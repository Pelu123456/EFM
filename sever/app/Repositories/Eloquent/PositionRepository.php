<?php
namespace App\Repositories\Eloquent;

use App\Repositories\Eloquent\BaseRepository;
use App\Models\Position;

class PositionRepository extends BaseRepository
{
    public function __construct(Position $model)
    {
        parent::__construct($model);
    }

    public function getByParentId($id)
    {
        return PositionAlias::join('position_aliases','positions.sport_type_id','=','position_aliases.id')
            ->select('positions.*')->where('position_aliases.id','=',$id)->get();
    }


}
