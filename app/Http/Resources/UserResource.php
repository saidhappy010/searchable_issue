<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'username' => $this->username,
            'phone' => $this->phone,
            'city_id' => $this->city_id,
            'organism_id' => $this->organism_id,
            'status' => $this->status,
            'structure_id' => $this->structure_id,
            'establishment_id' => $this->establishment_id,
            'email' => $this->email,
            'roles' =>  RolesResource::collection( $this->roles),
            
        ];
    }
}
