<?php

namespace App\Http\Resources\Coupon;

use Illuminate\Http\Resources\Json\JsonResource;

class CouponResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'coupon_code'=>$this->coupon_code,
            'amount'=>$this->amount,
            'amount_type'=>$this->amount_type,
            'expiry_date'=>$this->expiry_date,
            'status'=>$this->status
        ];
    }
}
