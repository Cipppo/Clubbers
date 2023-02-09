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

        // postclubber::factory()->create([
        //     'caption' => "Mi fai un tavolo ?", 
        //     'eventId' => 1,
        //     'clubberUsername' => "Cipe", 
        //     'ClubUsername' => 'UClub',
        // ]);

        // postclubber::factory()->create([
        //     'caption' => "Money Cash", 
        //     'eventId' => 2,
        //     'clubberUsername' => "Cipe", 
        //     'ClubUsername' => 'UClub',
        // ]);

        // postclubber::factory()->create([
        //     'caption' => "Porco Dio", 
        //     'eventId' => 3,
        //     'clubberUsername' => "Cipe", 
        //     'ClubUsername' => 'UClub',
        // ]);
        // postclubber::factory()->create([
        //     'caption' => "Daje roma Daje", 
        //     'eventId' => 4,
        //     'clubberUsername' => "Cipe", 
        //     'ClubUsername' => 'UClub',
        // ]);
        // postclubber::factory()->create([
        //     'caption' => "Ghe sboro", 
        //     'eventId' => 5,
        //     'clubberUsername' => "Cipe", 
        //     'ClubUsername' => 'UClub',
        // ]);
        // postclubber::factory()->create([
        //     'caption' => "Non vengo", 
        //     'eventId' => 6,
        //     'clubberUsername' => "Cipe", 
        //     'ClubUsername' => 'UClub',
        // ]);
        // postclubber::factory()->create([
        //     'caption' => "Cacca", 
        //     'eventId' => 7,
        //     'clubberUsername' => "Cipe", 
        //     'ClubUsername' => 'UClub',
        // ]);

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
            'URL' => 'images/proPics/CipeProPic.jpg', 
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

        event_banner::factory()->create([
            'eventId' => 1,
            'URL' => 'images/Banners/iGen1.jpg',
            'alt' => 'iGen Banner',
        ]);

        partecipa_evento::factory()->create([
            'idClubber' => 1, 
            'idEvento' => 1,
        ]);

        event::factory()->create([
            'name' => 'EnergyIlVenerdi - BlackOrWhite', 
            'description' => 'Il Venerdi sera bianco con la bianca',
            'clubName' => 'UClub', 
            'shortDescription' => 'Il Venerdi sera bianco con la bianca', 
            'Date' => "20/03/2022", 
            'Time' => '23',
        ]);

        event_banner::factory()->create([
            'eventId' => 2,
            'URL' => 'images/Banners/BlackOrWhite.jpg',
            'alt' => 'BlackOrWhite Banner',
        ]);

        event::factory()->create([
            'name' => 'EnergyIlVenerdi - Capodanno', 
            'description' => 'Il capodanno piu bianco che ci sia',
            'clubName' => 'UClub', 
            'shortDescription' => 'Il capodanno piu bianco che ci sia', 
            'Date' => "21/03/2022", 
            'Time' => '23',
        ]);

        event_banner::factory()->create([
            'eventId' => 3,
            'URL' => 'images/Banners/capodanno.jpeg',
            'alt' => 'Capodanno Banner',
        ]);

        event::factory()->create([
            'name' => 'EnergyIlVenerdi - Inaugurazione', 
            'description' => 'L inizio della fine',
            'clubName' => 'UClub', 
            'shortDescription' => 'L inizio della fine', 
            'Date' => "22/03/2022", 
            'Time' => '23',
        ]);

        event_banner::factory()->create([
            'eventId' => 4,
            'URL' => 'images/Banners/EnergyIlVenerdi.jpg',
            'alt' => 'Inaugurazione Banner',
        ]);

        event::factory()->create([
            'name' => 'EnergyIlVenerdi - Horror Circus', 
            'description' => 'I mostri si risvegliano (ancora)',
            'clubName' => 'UClub', 
            'shortDescription' => 'I mostri si risvegliano (ancora)', 
            'Date' => "23/03/2022", 
            'Time' => '23',
        ]);

        event_banner::factory()->create([
            'eventId' => 5,
            'URL' => 'images/Banners/HorrorCircus.jpg',
            'alt' => 'HorrorCircus Banner',
        ]);

        event::factory()->create([
            'name' => 'EnergyIlVenerdi - Mala Chica', 
            'description' => 'Mala Chica o Mala Riga ?',
            'clubName' => 'UClub', 
            'shortDescription' => 'Mala Chica o Mala Riga ?', 
            'Date' => "24/03/2022", 
            'Time' => '23',
        ]);

        event_banner::factory()->create([
            'eventId' => 6,
            'URL' => 'images/Banners/malaChica.jpg',
            'alt' => 'MalaChica Banner',
        ]);

        partecipa_evento::factory()->create([
            'idClubber' => 1, 
            'idEvento' => 6,
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
            'eventId' => 7,
            'URL' => 'images/Banners/iGen2.jpg',
            'alt' => 'iGen-Capitolo 2 Banner',
        ]);

        partecipa_evento::factory()->create([
            'idClubber' => 1, 
            'idEvento' => 7,
        ]);

    }
}
