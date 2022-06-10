<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Visualisation;
use App\Place;

class VisualisationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $places = Place::all();
        $place_ids = $places->pluck('id')->all();

        for ($i = 0; $i < 20; $i++) {
            $new_visualisation = new Visualisation;

            $new_visualisation->place_id = $faker->randomElement($place_ids);
            $new_visualisation->visitor = $faker->ipv4();

            $new_visualisation->save();
        }
    }
}
