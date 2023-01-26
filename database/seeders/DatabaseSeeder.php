<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\postclubber;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        postclubber::factory()->create([
            'caption' => "Lorem Ipsum", 
            'clubberUsername' => "Cipe", 
            'ClubUsername' => 'UClub',
        ]);

        postclubber::factory()->create([
            'caption' => "Lorem Ipsum2", 
            'clubberUsername' => "Cipe", 
            'ClubUsername' => 'UClub',
        ]);

        postclubber::factory()->create([
            'caption' => "Lorem Ipsum3", 
            'clubberUsername' => "Cipe", 
            'ClubUsername' => 'UClub',
        ]);
        postclubber::factory()->create([
            'caption' => "Lorem Ipsum4", 
            'clubberUsername' => "Cipe", 
            'ClubUsername' => 'UClub',
        ]);
        postclubber::factory()->create([
            'caption' => "Lorem Ipsum5", 
            'clubberUsername' => "Cipe", 
            'ClubUsername' => 'UClub',
        ]);
        postclubber::factory()->create([
            'caption' => "Lorem Ipsum6", 
            'clubberUsername' => "Cipe", 
            'ClubUsername' => 'UClub',
        ]);
        postclubber::factory()->create([
            'caption' => "Lorem Ipsum7", 
            'clubberUsername' => "Cipe", 
            'ClubUsername' => 'UClub',
        ]);

        User::factory()->create([
            'type' => 'User', 
            'name' => 'Luca', 
            'surname' => 'Rapolla', 
            'birth' => '25/01/2001', 
            'city' => 'Gatteo', 
            'email' => 'rapollaluca@gmail.com', 
            'phone' => '3206770451', 
            'password' => bcrypt('password'), 
            'username' => 'cip', 
            'via' => 'NULL', 
            'cap' => 'NULL', 
            'comune' => 'NULL', 
            'regione' => 'NULL',
        ]);

        User::factory()->create([
            'type' => 'Club', 
            'name' => 'NULL', 
            'surname' => 'NULL', 
            'birth' => 'NULL', 
            'city' => 'Cesenatico', 
            'email' => 'uclub@gmail.com', 
            'phone' => '3434343434', 
            'password' => bcrypt('password'), 
            'username' => 'UClub', 
            'via' => 'via', 
            'cap' => 'cpa', 
            'comune' => 'comune', 
            'regione' => 'regione',
        ]);

    }
}
