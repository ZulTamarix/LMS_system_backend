<?php

namespace App\Services;

use App\Models\Course\Course;

class CourseService
{
    // 1) GET — fetch all
    public function getAll()
    {
        return Course::all();
    }

    // 2) POST — create
    public function create(array $data)
    {
        return Course::create($data);
    }

    // 3) PUT — update
    public function update(string $id, array $data)
    {
        $course = Course::findOrFail($id);

        $course->update($data);

        return $course;
    }

    // 4) DELETE — delete
    public function delete(string $id)
    {
        $course = Course::findOrFail($id);

        return $course->delete();
    }
}