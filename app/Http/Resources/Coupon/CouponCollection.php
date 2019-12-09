<?php

namespace App\Http\Resources\Coupon;

use Illuminate\Http\Resources\Json\Resource;

class CouponCollection extends Resource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'coupon_code'=>$this->coupon_code,
            'amount'=>$this->amount,
            'amount_type'=>$this->amount_type,
            'expiry_date'=>$this->expiry_date,
            'status'=>$this->status
        ];
    }
}
