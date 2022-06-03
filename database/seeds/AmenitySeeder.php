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
            [
                'name' => 'TV',
                'slug' => '',
                'icon' => 'fa-solid fa-tv'
            ],
            [
                'name' => 'Kitchen',
                'slug' => '',
                'icon' => 'fa-solid fa-kitchen-set'
            ],
            [
                'name' => 'Hydromassage',
                'slug' => '',
                'icon' => 'fa-solid fa-water-ladder'
            ],
            [
                'name' => 'Animals Allowed',
                'slug' => '',
                'icon' => 'fa-solid fa-cat'
            ],
            [
                'name' => 'Fireplace',
                'slug' => '',
                'icon' => 'fa-solid fa-fire'
            ],
            [
                'name' => 'Fire Extinguisher',
                'slug' => '',
                'icon' => 'fa-solid fa-fire-extinguisher'
            ],
            [
                'name' => 'Medical Kit',
                'slug' => '',
                'icon' => 'fa-solid fa-briefcase-medical'
            ],
        ];
        foreach ($amenities as $amenity) {

            $new_amenity = new Amenity();

            $new_amenity->fill($amenity);

            $new_amenity->save();
        }
    }
}
