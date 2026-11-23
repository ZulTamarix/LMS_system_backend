<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'user_payment'; // 👈 database name
    protected $fillable = [
        'pym_urs_id',
        'pym_crs_id',
        'pym_price',
        'pym_paymentMethod',
        'pym_paymentNo',
        'pym_paymentDate',
        'pym_paymentTime',
    ];
}
