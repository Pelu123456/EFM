<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FootballMatch extends Model
{
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = [
        'id', 'tournament_id', 'match_date', 
        'home_team_id', 'away_team_id', 
        'home_score', 'away_score'
    ];

    public function tournament()
    {
        return $this->belongsTo(Tournament::class);
    }

    public function homeTeam()
    {
        return $this->belongsTo(Team::class, 'home_team_id');
    }

    public function awayTeam()
    {
        return $this->belongsTo(Team::class, 'away_team_id');
    }

    public function events()
    {
        return $this->hasMany(MatchEvent::class);
    }
}
