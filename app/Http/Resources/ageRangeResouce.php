<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ageRangeResouce extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "range"=>$this->range,
            "ageRangCapcity"=>$this->pivot->capacity
        ];
    }
}
