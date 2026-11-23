<?php

namespace App\Http\Controllers;

use App\Services\CourseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CourseController
{
    protected $courseService;

    public function __construct(CourseService $courseService)
    {
        $this->courseService = $courseService;
    }

    // 1) GET — fetch all
    public function index()
    {
        return response()->json([
            'status' => true,
            'data' => $this->courseService->getAll()
        ]);
    }

    // 2) POST — create
    public function store(Request $request)
    {
        Log::info($request);
        try {
            $validated = $request->validate([
                'crs_title'       => 'required|string|max:255',
                'crs_code'        => 'required|string|max:255',
                'crs_category'    => 'required|string|max:255',
                'crs_description' => 'required|string',
                'crs_thumbnail'   => 'required|string|max:255',
                'crs_type'        => 'required|string|max:255',
                'crs_price'       => 'required|numeric|min:0',
                'crs_duration'    => 'required|integer',
                'crs_status'      => 'required|string',
            ]);
            
            // set isPaid
            $validated['crs_isPaid'] = $validated['crs_price'] == 0 ? 0 : 1;

            // Send to service
            $course = $this->courseService->create($validated);

            return response()->json([
                'status' => true,
                'data' => $course
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
            'crs_title'       => 'required|string|max:255',
            'crs_code'        => 'required|string|max:255',
            'crs_category'    => 'required|string|max:255',
            'crs_description' => 'required|string',
            'crs_thumbnail'   => 'required|string|max:255',
            'crs_type'        => 'required|string|max:255',
            'crs_price'       => 'required|numeric',
            'crs_duration'    => 'required|integer',
            'crs_status'      => 'required|string',
        ]);

        // set isPaid
        $validated['crs_isPaid'] = $validated['crs_price'] == 0 ? 0 : 1;

        $course = $this->courseService->update($id, $validated);

        return response()->json($course);
    }

    // 4) DELETE — delete
    public function destroy(string $id)
    {
        $this->courseService->delete($id);

        return response()->json([
            'message' => 'Course deleted successfully'
        ]);
    }
}