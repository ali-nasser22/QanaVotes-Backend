<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class LeaderboardController extends Controller
{
    public function index()
    {
        $scores = [];

        foreach (Vote::all() as $vote) {
            try {
                $candidateId = Crypt::decrypt($vote->candidate_id);
                $value = Crypt::decrypt($vote->vote_value);

                if (! isset($scores[$candidateId])) {
                    $scores[$candidateId] = 0;
                }

                $scores[$candidateId] += $value;
            } catch (\Exception $e) {
                continue;
            }
        }

        $candidates = Candidate::all()->map(function ($candidate) use ($scores) {
            return [
                'id' => $candidate->id,
                'full_name' => $candidate->full_name,
                'score' => $scores[$candidate->id] ?? 0,
            ];
        })->sortByDesc('score')->values();

        return response()->json($candidates);
    }
}
