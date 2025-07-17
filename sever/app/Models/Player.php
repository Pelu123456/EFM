<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = ['id', 'full_name', 'birth_date', 'nationality', 'position', 'team_id'];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
