<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class establishmentResource extends JsonResource {
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray( $request ) {
        $num1 = $this->number_of_males;
        $num2 = $this->number_of_females;

        $registered = $num1 + $num2;
        $available_seats = $this->capacity - $registered;
        return [
            'id'              => $this->id,
            'name'            => $this->whenNotNull( $this->name ),
            'cityName'        => $this->whenNotNull( optional( optional( $this->town )->city )->name ),
            'townName'        => $this->whenNotNull( optional( $this->town )->name ),
            'sexe'            => $this->principal !== null ? $this->principal->sexes : $this->annexe->principal->sexes,
            'available_seats' => $available_seats,
        ];

    }
    public function with( $request ) {
        return [
            'meta' => [
                'version' => '1.0.2',
            ],
        ];
    }
    // public static $wrap = 'establishment';
}