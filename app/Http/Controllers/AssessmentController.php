<?php

namespace App\Http\Controllers;

use App\Services\AssessmentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AssessmentController
{
    protected $assessmentService;

    public function __construct(AssessmentService $assessmentService)
    {
        $this->assessmentService = $assessmentService;
    }

    // 1a) GET — fetch all
    public function index()
    {
        return response()->json([
            'status' => true,
            'data' => $this->assessmentService->with_course_question()
        ]);
    }

    // 2) POST — create
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'asm_crs_id'          => 'required|integer',
                'asm_title'           => 'required|string|max:255',
                'asm_totalQuestion'   => 'required|integer|min:1',
                'asm_timeLimit'           => 'required|integer|min:1',
                'asm_status'          => 'required|string|in:active,inactive',
                'asm_score'           => 'required|numeric|min:0',
            ]);

            // Send to service
            $assessment = $this->assessmentService->create($validated);

            return response()->json([
                'status' => true,
                'data' => $assessment
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
        $validated = $request->validate([
            'asm_crs_id'          => 'required|integer',
            'asm_title'           => 'required|string|max:255',
            'asm_totalQuestion'   => 'required|integer|min:1',
            'asm_timeLimit'           => 'required|integer|min:1',
            'asm_status'          => 'required|string|in:active,inactive',
            'asm_score'           => 'required|numeric|min:0',
        ]);

        $assessment = $this->assessmentService->update($id, $validated);

        return response()->json($assessment);
    }

    // 4) DELETE — delete
    public function destroy(string $id)
    {
        $this->assessmentService->delete($id);

        return response()->json([
            'message' => 'Assessment deleted successfully'
        ]);
    }
}