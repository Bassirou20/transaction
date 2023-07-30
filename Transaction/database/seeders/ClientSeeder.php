<?php

namespace Database\Seeders;

use App\Models\ClientModele;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ClientModele::create([
            'nom' => 'Seye',
            'prenom' => 'Bassirou',
            'numero_telephone' => '781483023',
        ]);

        ClientModele::create([
            'nom' => 'Diallo',
            'prenom' => 'Khaoussou',
            'numero_telephone' => '771237654',
        ]);

        ClientModele::create([
            'nom' => 'Paye',
            'prenom' => 'Oumy',
            'numero_telephone' => '772881003',
        ]);

        ClientModele::create([
            'nom' => 'Dash',
            'prenom' => 'Nabou',
            'numero_telephone' => '782336754',
        ]);

        ClientModele::create([
            'nom' => 'Mané',
            'prenom' => 'Adama',
            'numero_telephone' => '7898864320',
        ]);
    }
}
