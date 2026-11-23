<?php

namespace App\Models\Course;

use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    protected $table = 'course_assessment'; // 👈 database name
    protected $fillable = [
        'asm_crs_id',
        'asm_title',
        'asm_totalQuestion',
        'asm_timeLimit',
        'asm_status',
        'asm_score'
    ];
    
    public function course()
    {
        return $this->belongsTo(Course::class, 'asm_crs_id');
    }
    public function questions()
    {
        return $this->hasMany(Question::class, 'qst_asm_id', 'id');
    }

}
