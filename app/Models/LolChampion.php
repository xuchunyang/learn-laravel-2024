<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LolChampion extends Model
{
    protected $fillable = [
        'uid',
        'name',
        'title',
        'blurb',
    ];
}
