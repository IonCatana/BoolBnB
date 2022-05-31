<?php

use Illuminate\Database\Seeder;
use App\Amenity;

class AmenitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $amenities = [
            [
                'name' => 'WiFi',
                'slug' => '',
                'icon' => 'fa-solid fa-wifi'
            ],
            [
                'name' => 'Parking Slot',
                'slug' => '',
                'icon' => 'fa-solid fa-square-parking'
            ],
            [
                'name' => 'Swimming Pool',
                'slug' => '',
                'icon' => 'fa-solid fa-person-swimming'
            ],
            [
                'name' => 'AC',
                'slug' => '',
                'icon' => 'fa-solid fa-wind'
            ],
        ];
        foreach ($amenities as $amenity) {

            $new_amenity = new Amenity();

            $new_amenity->fill($amenity);

            $new_amenity->save();
        }
    }
}
