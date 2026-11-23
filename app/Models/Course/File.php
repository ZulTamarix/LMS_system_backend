<?php

namespace App\Models\Course;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $table = 'course_file'; // 👈 database name
    protected $fillable = [
        'fil_crs_id',
        'fil_title',
        'fil_description',
        'fil_order',
        'fil_file',
        'fil_duration',
        'fil_isRequired',
        'fil_status'
    ];
}
