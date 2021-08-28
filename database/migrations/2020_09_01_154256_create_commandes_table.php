<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commandes', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->integer('produit_id')->nullable();
            $table->string('produit_ref')->nullable();
            $table->longText('produits')->nullable();
            $table->string('total')->nullable();
            $table->string('frais_livraison')->nullable();
            $table->string('status')->nullable();
            $table->longText('session_id')->nullable();
            $table->date('date_commande')->nullable();
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
        Schema::dropIfExists('commandes');
    }
}
