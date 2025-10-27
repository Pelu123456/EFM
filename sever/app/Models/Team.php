<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = ['id', 'name', 'founded_year', 'home_city', 'organization_id','team_logo'];

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function players()
    {
        return $this->hasMany(Player::class);
    }

    public function participations()
    {
        return $this->hasMany(Participation::class);
    }
}
