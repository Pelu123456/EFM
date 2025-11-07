<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{

    protected $fillable = ['id', 'full_name', 'birth_date','team_id', 'nationality', 'position_id','player_avatar','user_id'];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
