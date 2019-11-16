<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $fillable =[
        'coupon_code','amount','amount_type','expiry_date','status'
    ];
}
