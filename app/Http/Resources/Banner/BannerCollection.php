<?php

namespace App\Http\Resources\Banner;

use Illuminate\Http\Resources\Json\Resource;

class BannerCollection extends Resource
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
            'image_name'=>$this->image,
            'title'=>$this->title,
            'link'=>$this->link,
            'status'=>$this->status
        ];
    }
}
