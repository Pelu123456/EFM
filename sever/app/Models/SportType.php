<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Position;
use Illuminate\Database\Eloquent\SoftDeletes;

class SportType extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
    ];

    public function Position()
    {
        return $this->belongsToMany(Position::class, 'sport_type_to_positions');
    }
}
