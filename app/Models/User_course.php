<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User_course extends Model
{
    protected $table = 'user_course'; // 👈 database name
    protected $fillable = [
        'usrCrs_usr_id',
        'usrCrs_crs_id'
    ];
}
