<?php

namespace App\Models\Course;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'course'; // 👈 database name
    protected $fillable = [
        'crs_title',
        'crs_code',
        'crs_category',
        'crs_description',
        'crs_thumbnail',
        'crs_type',
        'crs_isPaid',
        'crs_price',
        'crs_duration',
        'crs_status',
    ];
}
