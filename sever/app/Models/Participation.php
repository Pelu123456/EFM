<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Participation extends Model
{
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = ['id', 'team_id', 'tournament_id'];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function tournament()
    {
        return $this->belongsTo(Tournament::class);
    }
}

