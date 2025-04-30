<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Crypt;

class Vote extends Model
{
    protected $fillable = [
        'user_id',
        'candidate_id',
        'vote_value',
        'encrypted'
    ];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function candidate():BelongsTo
    {
        return $this->belongsTo(Candidate::class);
    }
    public function getDecryptedVoteValueAttribute()
    {
        return Crypt::decrypt($this->vote_value);
    }

    public function getDecryptedCandidateIdAttribute()
    {
        return Crypt::decrypt($this->candidate_id);
    }

}
