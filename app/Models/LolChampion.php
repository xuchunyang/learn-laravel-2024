<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LolChampion extends Model
{
    protected $fillable = [
        'uid',
        'name',
        'title',
        'blurb',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
