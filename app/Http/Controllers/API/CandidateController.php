<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    public function index()
    {
        return Candidate::all();
    }

    public function show($id)
    {
        $candidate = \DB::table('candidates')->where('id', $id)->first();
        return response()->json([
            'candidate' => $candidate,
        ]);
    }
}
