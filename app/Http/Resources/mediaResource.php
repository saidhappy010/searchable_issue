<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class mediaResource extends JsonResource
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
            'url'=>$this->original_url,
        ];
    }
}
// 'url'=>"http://localhost:8000/uploads/420f71545a8ee7d93b8f912ab15cde6c/téléchargement.jpeg",