<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MatchFormat extends Model
{
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = ['id', 'name', 'rules_json'];

    protected $casts = [
        'rules_json' => 'array',
    ];

    public function tournaments()
    {
        return $this->hasMany(Tournament::class);
    }
}
