<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = ['id', 'name', 'organization_id', 'match_format_id', 'start_date', 'end_date'];

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function matchFormat()
    {
        return $this->belongsTo(MatchFormat::class);
    }

    public function participations()
    {
        return $this->hasMany(Participation::class);
    }

    public function matches()
    {
        return $this->hasMany(FootballMatch::class);
    }
}

