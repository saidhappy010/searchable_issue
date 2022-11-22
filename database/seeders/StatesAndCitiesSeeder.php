<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Seeder;

class StatesAndCitiesSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        foreach ( $this->getData() as $city ) {
            $state = State::updateOrCreate(
                ['code' => $city['state_code']],
                ['name' => [
                    'fr' => $city['state_name_fr'],
                    'ar' => $city['state_name_ar'],
                ]]
            );

            $state->cities()->updateOrCreate(
                ['name' => [
                    'fr' => $city['city_name_fr'],
                    'ar' => $city['city_name_ar'],
                ]]
            );
        }
    }

    public function getData() {
        return [
            [
                "state_name_fr" => "State Fr 01",
                "state_name_ar" => "State Ar 01",
                "city_name_fr"  => "City 01 Fr of state 01",
                "city_name_ar"  => "City 01 Ar of state 01",
                "state_code"    => "01",
            ],
            [
                "state_name_fr" => "State Fr 01",
                "state_name_ar" => "State Ar 01",
                "city_name_fr"  => "City 02 Fr of state 01",
                "city_name_ar"  => "City 02 Ar of state 01",
                "state_code"    => "01",
            ],
            [
                "state_name_fr" => "State Fr 01",
                "state_name_ar" => "State Ar 01",
                "city_name_fr"  => "City 03 Fr of state 01",
                "city_name_ar"  => "City 03 Ar of state 01",
                "state_code"    => "01",
            ],
            [
                "state_name_fr" => "State Fr 02",
                "state_name_ar" => "State Ar 02",
                "city_name_fr"  => "City 01 Fr of state 02",
                "city_name_ar"  => "City 01 Ar of state 02",
                "state_code"    => "02",
            ],
            [
                "state_name_fr" => "State Fr 02",
                "state_name_ar" => "State Ar 02",
                "city_name_fr"  => "City 02 Fr of state 02",
                "city_name_ar"  => "City 02 Ar of state 02",
                "state_code"    => "02",
            ],
            [
                "state_name_fr" => "State Fr 03",
                "state_name_ar" => "State Ar 03",
                "city_name_fr"  => "City 01 Fr of state 03",
                "city_name_ar"  => "City 01 Ar of state 03",
                "state_code"    => "03",
            ],
        ];
    }
}
