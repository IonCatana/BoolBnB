<?php

use App\User;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        // SUPERUSERS (siamo noi!!)
        User::create([
            'name' => 'Antonio Bove',
            'email' => 'antoniofbove@gmail.com',
            'password' => Hash::make('Prova123'),
            'date_of_birth' => '1990-07-06'
        ]);
        User::create([
            'name' => 'Sarah Pirani',
            'email' => 'sarah.pirani@live.com',
            'password' => Hash::make('Prova123'),
            'date_of_birth' => '1990-08-08'
        ]);
        User::create([
            'name' => 'Michela Del Conte',
            'email' => 'micheladelconte@outlook.com',
            'password' => Hash::make('Prova123'),
            'date_of_birth' => '1994-12-14'
        ]);
        User::create([
            'name' => 'Ion Catana',
            'email' => 'catana.ion17@yahoo.it',
            'password' => Hash::make('Prova123'),
            'date_of_birth' => '1992-03-17'
        ]);

        // URA e UR
        for ($i = 0, $i < 10, $i++) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make($faker->password),
                'date_of_birth' => $faker->date('1930-m-d')
            ]);
        }
    }
}
