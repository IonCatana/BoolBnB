<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Message;
use App\Place;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $places = Place::all();
        $place_id = $places->pluck('id')->all();

        for ($i = 0; $i < 20; $i++) {
            $new_message = new Message();

            $new_message->place_id = random_int(1, 5);
            $new_message->sender_name = $faker->name();
            $new_message->sender_email = $faker->safeEmail();
            $new_message->object = $faker->sentence();
            $new_message->content = $faker->text(300);
            $new_message->save();
        }
    }
}
