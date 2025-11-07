<?php
namespace App\Repositories\Eloquent;

use App\Repositories\Eloquent\BaseRepository;
use App\Models\PositionAlias;

class PositionAliasRepository extends BaseRepository
{
    public function __construct(PositionAlias $model)
    {
        parent::__construct($model);
    }
    public function getByParentId($id)
    {
        return PositionAlias::join('sport_types','position_aliases.sport_type_id','=','sport_types.id')
            ->select('position_aliases.*')->where('sport_types.id','=',$id)->get();
    }

}
