<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId("type_inscription_id")->constrained();
            $table->foreignId("user_id")->constrained();
            $table->foreignId("student_id")->constrained();
            $table->foreignId("classe_room_id")->constrained();
            $table->foreignId("statut_inscription_id")->constrained();
            $table->text('dossier');
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
        Schema::dropIfExists('inscriptions');
    }
}
