<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{

    protected $fillable = ['name','code_name','position_alias_id'];

    public function player()
    {
       return $this->hasMany(Player::class, 'position_id', 'id');
    }

   public function alias()
    {
        return $this->belongsTo(PositionAlias::class, 'position_alias_id');
    }
}
