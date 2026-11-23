<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'user'; // 👈 database name
    protected $fillable = [
        'usr_role',
        
        'usr_name',
        'usr_phoneNo',
        'usr_email',
        'usr_company',
        'usr_username',
        'usr_password',
        'usr_status',
    ];
}
