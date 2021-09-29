<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use App\Models\Inscription;

class CreatePaiementsInscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paiements_inscriptions', function (Blueprint $table) {
            $table->id();
            $table->integer('montantPaye');
            $table->dateTime('datePaiement');
            $table->foreignIdFor(User::class)->constrained();
            $table->foreignIdFor(Inscription::class)->constrained();
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
        Schema::dropIfExists('paiements_inscriptions');
    }
}
