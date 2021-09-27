<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use App\Models\ClasseRoom;
use App\Models\Student;
use Carbon\Carbon;

class CreateAbsencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absences', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained();
            $table->foreignIdFor(Student::class)->constrained();
            $table->foreignIdFor(ClasseRoom::class)->constrained();
            $table->enum('type', ['Absence', 'Retard', 'Renvoi temporaire'])->default('Absence');
            $table->date('dateDebut')->default(Carbon::now());
            $table->date('dateFin')->nullable();
            $table->time('heureDeb')->nullable()->default(Carbon::now());
            $table->time('heureFin')->nullable();
            $table->integer('nbJours')->nullable();
            $table->integer('nbHeures')->nullable();
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
        Schema::dropIfExists('absences');
    }
}
