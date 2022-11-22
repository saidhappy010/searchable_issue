<?php

namespace Database\Seeders;

use App\Models\School;
use Illuminate\Database\Seeder;

class SchoolsSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        foreach ( $this->getData() as $school ) {
            School::updateOrCreate(
                [
                    'name'    => [
                        'fr' => $school['school_name_fr'],
                        'ar' => $school['school_name_ar'],
                    ],
                    'address' => [
                        'fr' => $school['school_address_fr'],
                        'ar' => $school['school_address_ar'],
                    ],
                    'email'   => $school['school_email'],
                    'city_id' => $school['city_id'],

                ],

            );
        }
    }

    public function getData() {

        return [
            [
                "school_name_fr"    => "School 1 Fr",
                "school_name_ar"    => "School 1 Ar",
                "school_address_fr" => "Address of school 1 Fr",
                "school_address_ar" => "Address of school 1 Ar",
                "school_email"      => "school1@gmail.com",
                "city_id"           => "1",
            ],
            [
                "school_name_fr"    => "School 2 Fr",
                "school_name_ar"    => "School 2 Ar",
                "school_address_fr" => "Address of school 2 Fr",
                "school_address_ar" => "Address of school 2 Ar",
                "school_email"      => "school2@gmail.com",
                "city_id"           => "2",
            ],
            [
                "school_name_fr"    => "School 3 Fr",
                "school_name_ar"    => "School 3 Ar",
                "school_address_fr" => "Address of school 3 Fr",
                "school_address_ar" => "Address of school 3 Ar",
                "school_email"      => "school3@gmail.com",
                "city_id"           => "3",
            ],
            [
                "school_name_fr"    => "School 4 Fr",
                "school_name_ar"    => "School 4 Ar",
                "school_address_fr" => "Address of school 4 Fr",
                "school_address_ar" => "Address of school 4 Ar",
                "school_email"      => "school4@gmail.com",
                "city_id"           => "4",
            ],
            [
                "school_name_fr"    => "School 5 Fr",
                "school_name_ar"    => "School 5 Ar",
                "school_address_fr" => "Address of school 5 Fr",
                "school_address_ar" => "Address of school 5 Ar",
                "school_email"      => "school5@gmail.com",
                "city_id"           => "5",
            ],
            [
                "school_name_fr"    => "School 6 Fr",
                "school_name_ar"    => "School 6 Ar",
                "school_address_fr" => "Address of school 6 Fr",
                "school_address_ar" => "Address of school 6 Ar",
                "school_email"      => "school6@gmail.com",
                "city_id"           => "6",
            ],
        ];
    }
}
