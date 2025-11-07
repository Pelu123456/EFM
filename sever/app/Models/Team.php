<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = ['id', 'name', 'founded_year', 'home_city', 'organization_id','logo','user_id'];

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
