<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class establishmentTypeResource extends JsonResource
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
            "name" => $this->name,
            'code' =>  $this->whenNotNull($this->code),
            'access_mode' => $this->whenNotNull($this->access_mode),
            'color' => $this->category->color,
            'isChecked'=>true,
            'description' => $this->description,
        ];
    }
}