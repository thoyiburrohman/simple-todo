<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany; // Import HasMany
class Project extends Model
{
    protected $guarded = ['id'];

    public function task(): HasMany
    {
        return $this->hasMany(Task::class);
    }
}
