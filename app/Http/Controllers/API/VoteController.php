<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class VoteController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'candidate_id'=>'required|exists:candidates,id',
            'vote_value'=>'required|in:1,-1',
        ]);
        $vote = Vote::create([
            'user_id'=>auth()->user()->id,
            'candidate_id'=>Crypt::encrypt($validated['candidate_id']),
            'vote_value'=>\Crypt::encrypt($validated['vote_value']),
            'encrypted'=>true
        ]);

        return response()->json([
            'message'=>'Vote submitted successfully.',
            'vote_id'=>$vote->id,
        ],201);
    }

    public function myVotes()
    {
        $votes = auth()->user()->votes->map(function ($vote) {
            return [
                'candidate_id'=>$vote->decrypted_candidate_id,
                'Vote_value'=>$vote->decrypted_vote_value,
                'voted_at'=>$vote->created_at->format('Y-m-d H:i:s'),
            ];
        });
        return response()->json([
            "votes"=>$votes,
        ]);
    }
}
