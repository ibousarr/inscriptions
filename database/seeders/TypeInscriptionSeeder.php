<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeInscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("type_inscriptions")->insert([
        	
            ["nom"=> "Nouvelle inscription", "montant" => 8000],
            ["nom"=> "Réinscription", "montant" => 7000],
            ["nom"=> "Transfert", "montant" => 8000],
            ["nom"=> "BFEM", "montant" => 9000],
            ["nom"=> "Suspension", "montant" => 2000],
        ]);
    }
}
