<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Organization extends Model
{
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = ['id', 'name', 'level', 'parent_id'];

    public function parent()
    {
        return $this->belongsTo(Organization::class, 'parent_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(Organization::class, 'parent_id');
    }

    public function teams()
    {
        return $this->hasMany(Team::class);
    }

    public function tournaments()
    {
        return $this->hasMany(Tournament::class);
    }
}

