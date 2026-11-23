<?php

namespace App\Services;

use App\Models\Course\Assessment;

class AssessmentService
{
    // 1) GET — fetch all
    public function getAll()
    {
        return Assessment::all();
    }
    // 1b) Included 'course' and 'question'
    public function with_course_question()
    {
        return Assessment::with('course', 'questions')->get();
    }

    // 2) POST — create
    public function create(array $data)
    {
        return Assessment::create($data);
    }

    // 3) PUT — update
    public function update(string $id, array $data)
    {
        $course = Assessment::findOrFail($id);

        $course->update($data);

        return $course;
    }

    // 4) DELETE — delete
    public function delete(string $id)
    {
        $course = Assessment::findOrFail($id);

        return $course->delete();
    }
}