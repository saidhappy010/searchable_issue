<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\establishmentTypeResource;


class principalResource extends JsonResource
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
            'id' => $this->id,
            'decree_number' => $this->decree_number,
            'decree_date' => $this->decree_date,
            'sexes' => $this->sexes,
            'support_types' => $this->support_types,
            'facebook' => $this->facebook,
            'instagram' => $this->instagram,
            'facebook' => $this->facebook,
            'website' => $this->website,
            'establishment_type' => new establishmentTypeResource($this->establishmentType),
        ];
    }
}
