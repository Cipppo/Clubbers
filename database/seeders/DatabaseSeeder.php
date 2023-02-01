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
            'caption' => "Mi fai un tavolo ?", 
            'clubberUsername' => "Cipe", 
            'ClubUsername' => 'UClub',
        ]);

        postclubber::factory()->create([
            'caption' => "Money Cash", 
            'clubberUsername' => "Lucone", 
            'ClubUsername' => 'UClub',
        ]);

        postclubber::factory()->create([
            'caption' => "Porco Dio", 
            'clubberUsername' => "Ez", 
            'ClubUsername' => 'UClub',
        ]);
        postclubber::factory()->create([
            'caption' => "Daje roma Daje", 
            'clubberUsername' => "LaNico", 
            'ClubUsername' => 'UClub',
        ]);
        postclubber::factory()->create([
            'caption' => "Ghe sboro", 
            'clubberUsername' => "Cipe", 
            'ClubUsername' => 'UClub',
        ]);
        postclubber::factory()->create([
            'caption' => "Non vengo", 
            'clubberUsername' => "LaFra", 
            'ClubUsername' => 'UClub',
        ]);
        postclubber::factory()->create([
            'caption' => "Cacca", 
            'clubberUsername' => "Lucone", 
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
            'username' => 'Cipe', 
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
