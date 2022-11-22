<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class establishmentWithPosition extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return    [ 
        'id' => $this->id,
        "name"=>$this->name,
        'latitude' => $this->latitude,
        'longitude' => $this->longitude,
        'map_zoom' => $this->map_zoom,
        'address' => $this->address,
        'phone' => $this->phone,
        'fax' => $this->fax,
        'city' => $this->town->city->name,
        'town' => $this->town->name,
        'email' => $this->email,
        "image"=>$this->getFirstMediaUrl( "images" ),
        'website' => $this->principal!==null?$this->whenNotNull(optional($this->principal)->website):$this->whenNotNull(optional(optional($this->annexe)->principal)->website),
        'typeEstablishmentId'=>$this->principal!==null?$this->whenNotNull(optional(optional($this->principal)->establishmentType)->id):$this->whenNotNull(optional(optional(optional($this->annexe)->principal)->establishmentType)->id),
        'typeEstablishmentName'=>$this->principal!==null?$this->whenNotNull(optional(optional($this->principal)->establishmentType)->name):$this->whenNotNull(optional(optional(optional($this->annexe)->principal)->establishmentType)->name),
        'color'=>$this->principal!==null?$this->whenNotNull(optional(optional($this->principal)->establishmentType)->category->color):$this->whenNotNull(optional(optional(optional($this->annexe)->principal)->establishmentType)->category->color),
       ];
    }
}