<?php

namespace Database\Seeders;

use App\Models\CompteModele;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CompteModele::create([
            'client_modele_id' => 1,
            'fournisseur' => 'OrangeMoney',
            'solde' => 5000000.00,
        ]);

        CompteModele::create([
            'client_modele_id' => 2,
            'fournisseur' => 'Wave',
            'solde' => 3000.50,
        ]);

        CompteModele::create([
            'client_modele_id' => 3,
            'fournisseur' => 'Wari',
            'solde' => 10000.75,
        ]);

        CompteModele::create([
            'client_modele_id' => 4,
            'fournisseur' => 'Compte Bancaire',
            'solde' => 80000.00,
        ]);

        CompteModele::create([
            'client_modele_id' => 5,
            'fournisseur' => 'Compte Bancaire',
            'solde' => 2500000.25,
        ]);
    }
}
