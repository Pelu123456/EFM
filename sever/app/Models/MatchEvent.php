<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MatchEvent extends Model
{
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = ['id', 'match_id', 'minute', 'type', 'player_id', 'team_id'];

    public function footballMatch()
    {
        return $this->belongsTo(FootballMatch::class);
    }

    public function player()
    {
        return $this->belongsTo(Player::class);
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}

