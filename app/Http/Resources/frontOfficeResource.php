<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class frontOfficeResource extends JsonResource
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
            "homePage_p1_title"=>$this->homePage_p1_title,
            "homePage_p1_description"=>$this->homePage_p1_description,
            "establishmentTypePage_title"=>$this->establishmentTypePage_title,
            "establishmentTypePage_desc"=>$this->establishmentTypePage_desc,
            "homePage_p2_title"=>$this->homePage_p2_title,
            "homePage_p2_description"=>$this->homePage_p2_description,
            "aboutPage_p1_title"=>$this->aboutPage_p1_title,
            "aboutPage_p1_description"=>$this->aboutPage_p1_description,
            "aboutPage_p2_title"=>$this->aboutPage_p2_title,
            "aboutPage_p2_description"=>$this->aboutPage_p2_description,
            "phone"=>$this->phone,
            "email"=>$this->email,
            "address"=>$this->address,
            "homPageimage"=>$this->getFirstMediaUrl("image1"),
            "aboutPageimage1"=>$this->getFirstMediaUrl("image2"),
            "aboutPageimage2"=>$this->getFirstMediaUrl("image3"),
       ]; 
    }
}