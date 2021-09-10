<?php

namespace Database\Seeders;


use App\Models\AnneeScolaire;
use App\Models\Article;
use App\Models\Client;
use App\Models\User;

use Illuminate\Database\Seeder;
use DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Les Années scolaires
        $annees = DB::table('annee_scolaires')->insert([
            ['annee' =>  '2020-2021'],
            ['annee' =>  '2021-2022'],
            ['annee' =>  '2022-2023'],
            ['annee' =>  '2023-2024'],
            ['annee' =>  '2024-2025'],
        ]);

        $settings = DB::table('settings')->insert([
            'anneeEnCours'  =>  config('setting.anneeEnCours'),
            'etablissement' =>  config('setting.etablissement'),
            'ief'           =>  config('setting.ief'),
            'academie'      =>  config('setting.academie'),
            'adresse'       =>  config('setting.adresse'),
            'email'         =>  config('setting.email'),
            'phone'         =>  config('setting.phone'),
            'cetab'         =>  config('setting.cetab'),
            'site'          =>  config('setting.site') ?? null,
            'ien'           =>  config('setting.ien') ?? null,
            'banque'        =>  config('setting.banque') ?? null,
            'compte'        =>  config('setting.compte') ?? null,
            'president_ape' =>  config('setting.president_ape') ?? null,
        ]);

        //$this->call(TypeInscriptionSeeder::class);
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
            ['10', 'Transit', '0'],
            ['11', 'Suspension', '0'],
            ['31', '3è A', '25'],
            ['32', '3è B', '25'],
            ['41', '4è A', '25'],
            ['42', '4è B', '25'],
            ['51', '5è A', '25'],
            ['52', '5è B', '25'],
            ['61', '6è A', '25'],
            ['62', '6è B', '25'],            
        ];
         
        foreach($classes as $classe) {
            \App\Models\ClasseRoom::create([
                'refClasse' => $classe[0],
                'libClasse' => $classe[1],
                'nbTables'  => $classe[2],
            ]);
        }

        \App\Models\Student::factory(110)->create();

        $eleves = \App\Models\Student::all();

         foreach ($eleves as $eleve) {

             \App\Models\Inscription::create([
                    'annee_scolaire_id'     =>  2,
                    'type_inscription_id'   =>  mt_rand(1, 5),
                    'classe_room_id'        =>  mt_rand(2, 9),
                    'student_id'            =>  $eleve->id,
                    'user_id'               =>  mt_rand(1, 10),
                    'statut_inscription_id' =>  mt_rand(1, 4),
                    'dossier'               =>  ['Complet', 'Incomplet'][mt_rand(0, 1)],
             ]);
         }
        
    }
}
