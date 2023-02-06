<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\postclubber;
use App\Models\User;
use App\Models\userProPic;
use App\Models\event;
use App\Models\partecipa_evento;
use App\Models\event_banner;

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
            'clubberUsername' => "Cipe", 
            'ClubUsername' => 'UClub',
        ]);

        postclubber::factory()->create([
            'caption' => "Porco Dio", 
            'clubberUsername' => "Cipe", 
            'ClubUsername' => 'UClub',
        ]);
        postclubber::factory()->create([
            'caption' => "Daje roma Daje", 
            'clubberUsername' => "Cipe", 
            'ClubUsername' => 'UClub',
        ]);
        postclubber::factory()->create([
            'caption' => "Ghe sboro", 
            'clubberUsername' => "Cipe", 
            'ClubUsername' => 'UClub',
        ]);
        postclubber::factory()->create([
            'caption' => "Non vengo", 
            'clubberUsername' => "Cipe", 
            'ClubUsername' => 'UClub',
        ]);
        postclubber::factory()->create([
            'caption' => "Cacca", 
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

        userProPic::factory()->create([
            'username' => 'Cipe', 
            'URL' => 'images/proPics/100x100.jpg', 
            'alt' => 'Cipe Profile Avatar',
        ]);

        event::factory()->create([
            'name' => 'iGen', 
            'description' => 'Il party per la generazione Z',
            'clubName' => 'UClub', 
            'shortDescription' => 'Il party per la generazione Z', 
            'Date' => "18/03/2022", 
            'Time' => '23',
        ]);

        event::factory()->create([
            'name' => 'iGen - Capitolo 2', 
            'description' => 'Il party per la generazione Z con quel negro di bello figo',
            'clubName' => 'UClub', 
            'shortDescription' => 'Il party per la generazione Z con quel negro di Bello Figo', 
            'Date' => "25/03/2022", 
            'Time' => '23',
        ]);
        
        event_banner::factory()->create([
            'eventId' => 1,
            'URL' => 'images/Banners/tryBanner.jpg',
            'alt' => 'iGen Banner',
        ]);

        event_banner::factory()->create([
            'eventId' => 2,
            'URL' => 'images/Banners/tryBanner2.jpg',
            'alt' => 'iGen-Capitolo 2 Banner',
        ]);


        partecipa_evento::factory()->create([
            'idClubber' => 1, 
            'idEvento' => 1,
        ]);

        partecipa_evento::factory()->create([
            'idClubber' => 1, 
            'idEvento' => 2,
        ]);

    }
}
