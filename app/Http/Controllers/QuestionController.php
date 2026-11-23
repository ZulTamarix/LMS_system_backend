<?php

namespace App\Http\Controllers;

use App\Services\QuestionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class QuestionController
{
    protected $questionService;

    public function __construct(QuestionService $questionService)
    {
        $this->questionService = $questionService;
    }

    // 1a) GET — fetch all
    public function show(string $qst_asm_id)
    {
        return response()->json([
            'status' => true,
            'data' => $this->questionService->getAll($qst_asm_id)
        ]);
    }

    // 2) POST — create
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'questions'                 => 'required|array|min:1',
                'questions.*.qst_asm_id'    => 'required|integer|exists:course_assessment,id',
                'questions.*.qst_order'     => 'required|integer|min:1',
                'questions.*.qst_question'  => 'required|string',
                'questions.*.qst_option_A'  => 'required|string|max:255',
                'questions.*.qst_option_B'  => 'required|string|max:255',
                'questions.*.qst_option_C'  => 'required|string|max:255',
                'questions.*.qst_option_D'  => 'required|string|max:255',
                'questions.*.qst_answer'    => 'required|string|in:A,B,C,D',
            ]);

            $question = $this->questionService->create($validated['questions']);

            return response()->json([
                'status' => true,
                'data' => $question
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'data' => $e->getMessage()
            ], 500);
        }
    }

    // 3) PUT — update
    public function update(Request $request, string $id)
    {
        Log::info($request);
        Log::info($id);
       
        $validated = $request->validate([
            'questions'                 => 'required|array|min:1',
            'questions.*.qst_asm_id'    => 'required|integer',
            'questions.*.qst_order'     => 'required|integer|min:1',
            'questions.*.qst_question'  => 'required|string',
            'questions.*.qst_option_A'  => 'required|string|max:255',
            'questions.*.qst_option_B'  => 'required|string|max:255',
            'questions.*.qst_option_C'  => 'required|string|max:255',
            'questions.*.qst_option_D'  => 'required|string|max:255',
            'questions.*.qst_answer'    => 'required|string|in:A,B,C,D',
        ]);

        $question = $this->questionService->update($id, $validated['questions']);

        return response()->json([
            'status' => true,
            'data' => $question
        ]);
    }

    // 4) DELETE — delete
    public function destroy(string $id)
    {
        $this->questionService->delete($id);

        return response()->json([
            'message' => 'Question deleted successfully'
        ]);
    }
}