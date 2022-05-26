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
                'icon' => 'fas fa-wifi'
            ],
            [
                'name' => 'Parking Slot',
                'slug' => '',
                'icon' => 'fas fa-parking' //TODO
            ],
            [
                'name' => 'Swimming Pool',
                'slug' => '',
                'icon' => 'fas fa-swimmer'
            ],
            [
                'name' => 'AC',
                'slug' => '',
                'icon' => 'fas fa-fan'
            ],
        ];
        foreach ($amenities as $amenity) {

            $new_amenity = new Amenity();

            $new_amenity->fill($amenity);

            $new_amenity->save();
        }
    }
}
