<?php

namespace App\Models\Course;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'course_assessment_question'; // 👈 database name
    protected $fillable = [
        'qst_asm_id',
        'qst_order',
        'qst_question',
        'qst_option_A',
        'qst_option_B',
        'qst_option_C',
        'qst_option_D',
        'qst_answer'
    ];
}
