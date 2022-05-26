<?php

use App\Sponsorship;
use Illuminate\Database\Seeder;

class SponsorshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sponsorships = [
            [
                'denomination' => 'basic',
                'price' => 2.99,
                'duration' => 24
            ],
            [
                'denomination' => 'advanced',
                'price' => 5.99,
                'duration' => 72
            ],
            [
                'denomination' => 'premium',
                'price' => 9.99,
                'duration' => 144
            ],
        ];

        foreach ($sponsorships as $sponsorship) {
            $new_sponsorship = new Sponsorship();
            $new_sponsorship->fill($sponsorship);
            $new_sponsorship->save();
        }
    }
}
