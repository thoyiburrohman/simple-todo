<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    protected $guarded = ['id'];
    protected $casts = [
        'is_completed' => 'boolean', // Pastikan ini di-cast ke boolean
    ];
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
