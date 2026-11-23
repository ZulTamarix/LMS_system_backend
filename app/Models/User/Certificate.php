<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    protected $table = 'user_certificate'; // 👈 database name
    protected $fillable = [
        'crt_urs_id',
        'crt_crs_id',
        'crt_no',
        'crt_date_completed',
        'crt_file'
    ];
}
