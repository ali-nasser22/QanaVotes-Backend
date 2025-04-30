<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'candidate_id' => 'required|exists:candidates,id',
            'question_text' => 'required|string|max:1000',
        ]);

        $question = Question::create([
            'user_id' => auth()->id(),
            'candidate_id' => $validated['candidate_id'],
            'question_text' => $validated['question_text'],
        ]);

        return response()->json([
            'message' => 'Question submitted successfully.',
            'question_id' => $question->id,
        ], 201);
    }
    public function myQuestions()
    {
        $questions = auth()->user()->questions()->with('candidate:id,full_name')->latest()->get();

        $formatted = $questions->map(function ($question) {
            return [
                'candidate' => $question->candidate->full_name,
                'question' => $question->question_text,
                'asked_at' => $question->created_at->format('Y-m-d H:i'),
            ];
        });

        return response()->json([
            'questions' => $formatted,
        ]);
    }
}
