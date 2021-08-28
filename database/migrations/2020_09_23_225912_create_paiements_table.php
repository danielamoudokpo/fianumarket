<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaiementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paiements', function (Blueprint $table) {
            $table->id();
            $table->string("telephone")->nullable();
            $table->string("type_paiement")->nullable();
            $table->string('user_session')->nullable();
            $table->integer('user_id');
            $table->string('commande_id');
            $table->string('paiement_id');
            $table->date('paiement_date');
            $table->string('paiement_status');
            $table->string('paiement_montant');
            $table->string('paiement_description');

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
        Schema::dropIfExists('paiements');
    }
}
