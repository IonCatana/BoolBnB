<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\User;
use App\Place;
use Illuminate\Support\Str;

class PlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        $users = User::all();
        $userId = $users->pluck('id')->all();

        for($i=0; $i<10; $i++){
            $new_place = new Place();

            $new_place->user_id = $faker->randomElement($userId); 
            $new_place->title =  $faker->colorName();
            $new_place->slug = Str::slug($new_place->title); 
            $new_place->rooms = $faker->numberBetween(1,10);
            $new_place->beds = $faker->numberBetween(1,4);
            $new_place->bathrooms = $faker->numberBetween(1,5);
            $new_place->square_meters = $faker->numberBetween(30,200);
            $new_place->address = $faker->address();
            $new_place->lat = $faker->latitude(35, 47);
            $new_place->lng = $faker->longitude(6,18);
            $new_place->img = $faker->imageUrl('houses'); //nullable

            $new_place->save();

        }
    }
}
