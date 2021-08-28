<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvenementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evenements', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('organisateur');
            $table->string('status');
            $table->string('lieu');
            $table->string('participation');
            $table->integer('id_type_evenement');
            $table->integer('nb_personne');
            $table->dateTime('date_time');
            $table->dateTime('date');
            $table->dateTime('heure');
            $table->dateTime('ville');
            $table->dateTime('pays');
            $table->dateTime('contact');
            $table->dateTime('exigence');
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
        Schema::dropIfExists('evenements');
    }
}
