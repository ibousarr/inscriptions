<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("permissions")->insert([

            ["nom"=> "ajouter une classe"],
            ["nom"=> "consulter une classe"],
            ["nom"=> "editer une classe"],

            ["nom"=> "ajouter un student"],
            ["nom"=> "consulter un student"],
            ["nom"=> "editer un student"],
            ["nom"=> "supprimer un student"],

            ["nom"=> "ajouter une inscription"],
            ["nom"=> "consulter une inscription"],
            ["nom"=> "editer une inscription"],
            ["nom"=> "supprimer une inscription"],

            ["nom"=> "ajouter un paiement"],
            ["nom"=> "consulter un paiement"],
            ["nom"=> "editer un paiement"],
            ["nom"=> "supprimer un paiement"],
            
            ["nom"=> "ajouter un client"],
            ["nom"=> "consulter un client"],
            ["nom"=> "editer un client"],

            ["nom"=> "ajouter une location"],
            ["nom"=> "consulter une location"],
            ["nom"=> "editer une location"],

            ["nom"=> "ajouter un article"],
            ["nom"=> "consulter un article"],
            ["nom"=> "editer un article"]
        ]);
    }
}
