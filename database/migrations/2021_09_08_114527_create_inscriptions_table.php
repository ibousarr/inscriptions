<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\{
    AnneeScolaire,
    TypeInscription,
    StatutInscription,
    ClasseRoom,
    Student,
    User,
};

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
            $table->foreignIdFor(AnneeScolaire::class)->constrained();
            $table->foreignIdFor(TypeInscription::class)->constrained();
            $table->foreignIdFor(User::class)->constrained();
            $table->foreignIdFor(Student::class)->constrained();
            $table->foreignIdFor(ClasseRoom::class)->constrained();
            $table->foreignIdFor(StatutInscription::class)->constrained();
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
