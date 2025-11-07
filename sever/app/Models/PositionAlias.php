<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PositionAlias extends Model
{
   protected $fillable = ['sport_type_id', 'name','code_name'];

    public function position()
    {
        return $this->hasMany(Position::class);
    }
}
