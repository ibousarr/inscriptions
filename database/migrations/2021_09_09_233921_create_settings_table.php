<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('anneeEnCours');
            $table->string('etablissement');
            $table->string('ief');
            $table->string('academie');
            $table->string('adresse');
            $table->string('email');
            $table->string('phone');
            $table->string('cetab');
            $table->string('site');
            $table->string('ien');
            $table->string('banque');
            $table->string('compte');
            $table->string('president_ape');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
