<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class establishmentCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            $this->collection->transform(function($task){
                  return [
                'id' => $this->id,
                'name' => $this->whenNotNull($this->name),
                'cityName' =>$this->whenNotNull(optional(optional($this->town)->city)->name) ,
                'townName' =>$this->whenNotNull(optional($this->town)->name) ,
            ];})->map->toArray($request)->all()
            
       ]; 
    }
    public function with($task)
    {
        return [
            'meta' => [
                'version'=>'1.0.2'
            ]
        ];
    }
    
}
