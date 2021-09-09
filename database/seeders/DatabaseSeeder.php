<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Client;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TypeArticleTableSeeder::class);

        Article::factory(10)->create();
        Client::factory(10)->create();
        User::factory(10)->create();

        $this->call(RoleTableSeeder::class);
        $this->call(StatutLocationTableSeeder::class);
        $this->call(PermissionTableSeeder::class);
        $this->call(DureeLocationTableSeeder::class);



        User::find(1)->roles()->attach(1);
        User::find(2)->roles()->attach(2);
        User::find(3)->roles()->attach(3);
        User::find(4)->roles()->attach(4);

         DB::table('type_inscriptions')->insert([
            [
                'nom'       =>  'Nouvelle inscription',
                'montant'   =>  '8000'
            ],
            [
                'nom'       =>  'Réinscription',
                'montant'   =>  '7000'
            ],
            [
                'nom'       =>  'Transfert',
                'montant'   =>  '8000'
            ],
            [
                'nom'       =>  'BFEM',
                'montant'   =>  '9000'
            ],
            [
                'nom'       =>  'Suspension',
                'montant'   =>  '2000'
            ],
        ]);

        DB::table("statut_inscriptions")->insert([
            ["nom"=>"En attente"],
            ["nom"=>"En cours"],
            ["nom"=>"Terminée"],
            ["nom"=>"Validée"],
        ]);

        $classes = [
            ['10', 'Transit'],
            ['11', 'Suspension'],
            ['31', '3è A'],
            ['32', '3è B'],
            ['41', '4è A'],
            ['42', '4è B'],
            ['51', '5è A'],
            ['52', '5è B'],
            ['61', '6è A'],
            ['62', '6è B'],            
        ];
         
        foreach($classes as $classe) {
            \App\Models\ClasseRoom::create([
                'refClasse' => $classe[0],
                'libClasse' => $classe[1],
            ]);
        }

        \App\Models\Student::factory(110)->create();

        $eleves = \App\Models\Student::all();

         foreach ($eleves as $eleve) {

             \App\Models\Inscription::create([
                    'type_inscription_id'          =>  mt_rand(1, 5),
                    'classe_room_id'     =>  mt_rand(2, 9),
                    'student_id'    =>  $eleve->id,
                    'user_id'       =>  mt_rand(1, 10),
                    'statut_inscription_id' =>  mt_rand(1, 4),
                    'dossier'       =>  ['Complet', 'Incomplet'][mt_rand(0, 1)],
             ]);
         }

         

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
            ["nom"=> "supprimer un paiement"]
            
        ]);

        DB::table("roles")->insert([
            ["nom"=>"superadmin"],
            ["nom"=>"admin"],
            ["nom"=>"gestionnaire"],
            ["nom"=>"surveillant"],
            ["nom"=>"professeur"]
        ]);

        
    }
}
