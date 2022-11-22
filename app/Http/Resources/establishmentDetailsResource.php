<?php

namespace App\Http\Resources;

use App\Http\Resources\principalResource;
use Illuminate\Http\Resources\Json\JsonResource;

class establishmentDetailsResource extends JsonResource {
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray( $request ) {
        $num1 = $this->number_of_males;
        $num2 = $this->number_of_females;
        $capacity = $this->capacity;

        $registered = $num1 + $num2;
        $available_seats = $this->capacity - $registered;
        $percentage = round( $registered * 100 / $capacity );

        return [
            'id'                       => $this->id,
            'name'                     => $this->name,
            'latitude'                 => $this->latitude,
            'longitude'                => $this->longitude,
            'map_zoom'                 => $this->map_zoom,
            'address'                  => $this->address,
            'phone'                    => $this->phone,
            'fax'                      => $this->fax,
            'email'                    => $this->email,
            'inscription_period'       => $this->inscription_period,
            'open'                     => $this->open,
            'reason_of_closure'        => $this->reason_of_closure,
            'town'                     => $this->town->name,
            'city'                     => $this->town->city->name,
            'start_inscription_period' => $this->start_inscription_period,
            'end_inscription_period'   => $this->end_inscription_period,
            $this->mergeWhen( auth( 'sanctum' )->user(), [
                'number_of_males'       => $this->number_of_males,
                'number_of_females'     => $this->number_of_females,
                'capacity'              => $this->capacity,
                'registered'            => $registered,
                'available_seats'       => $available_seats,
                'percentage'            => $percentage,
                'responsible_firstname' => $this->responsible_firstname,
                'responsible_lastname'  => $this->responsible_lastname,
                'responsible_email'     => $this->responsible_email,
                'responsible_phone'     => $this->responsible_phone,
            ] ),
            'ageRanges'                => ageRangeResouce::collection( $this->ageRanges ),
            'receptionDays'            => receptioDaysResource::collection( $this->receptionDays ),
            'populationTypes'          => populationTypesResource::collection( $this->populationTypes ),
            "images"                   => mediaResource::collection( $this->getMedia( "images" ) ),
            'principal'                => $this->principal !== null ? new principalResource( $this->principal ) : new annexesResource( $this->parent ),
        ];
    }
}
