<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSouhaitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('souhaits', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('produit_id')->nullable();
            $table->string('designation')->nullable();
            $table->string('prix')->nullable();
            $table->integer('quantite')->nullable();
            $table->string('photo')->nullable();
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
        Schema::dropIfExists('souhaits');
    }
}
