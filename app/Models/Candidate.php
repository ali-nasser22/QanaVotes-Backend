<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Candidate extends Model
{
    protected $fillable = [
        'full_name',
        'bio',
        'photo_url'
    ];

    public function votes():HasMany
    {
        return $this->hasMany(Vote::class);
    }

    public function questions():HasMany
    {
        return $this->hasMany(Question::class);
    }
}
