<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("roles")->insert([
            ["nom"=>"superadmin"],
            ["nom"=>"admin"],
            ["nom"=>"gestionnaire"],
            ["nom"=>"surveillant"],
            ["nom"=>"professeur"],
            ["nom"=>"manager"],
            ["nom"=>"employe"]
        ]);
    }
}
