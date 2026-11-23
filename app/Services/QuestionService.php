<?php

namespace App\Services;

use App\Models\Course\Question;

use Illuminate\Support\Facades\DB;

class QuestionService
{
    // 1) GET — fetch all
    public function getAll(string $qst_crs_id)
    {
        return Question::where('qst_asm_id', $qst_crs_id)->get();
    }

    // 2) POST — create
    public function create(array $data)
    {
        Question::insert($data);

        return Question::where('qst_asm_id', $data[0]['qst_asm_id'])
            ->get();
    }

    // 3) PUT — update
    public function update(string $id, array $data)
    {
        return DB::transaction(function () use ($id, $data) {

            // Delete existing questions
            Question::where('qst_asm_id', $id)->delete();

            // Insert updated questions
            Question::insert($data);

            // Return updated questions
            return Question::where('qst_asm_id', $id)
                ->orderBy('qst_order')
                ->get();
        });
    }

    // 4) DELETE — delete
    public function delete(string $id)
    {
        $course = Question::findOrFail($id);

        return $course->delete();
    }
}