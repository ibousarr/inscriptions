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
            $table->string('anneeEnCours')->default(config('setting.anneeEnCours'));
            $table->string('etablissement')->default(config('setting.etablissement'));
            $table->string('ief')->default(config('setting.ief'));
            $table->string('academie')->default(config('setting.academie'));
            $table->string('adresse')->default(config('setting.adresse'));
            $table->string('email')->default(config('setting.email'));
            $table->string('phone')->default(config('setting.phone'));
            $table->string('cetab')->default(config('setting.cetab'));
            $table->string('site')->nullable();
            $table->string('ien')->nullable();
            $table->string('banque')->nullable();
            $table->string('compte')->nullable();
            $table->string('president_ape')->nullable();
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
