<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBestellingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bestellings', function (Blueprint $table) {
            $table->unsignedBigInteger('artikel_id');
            $table->foreign('artikel_id')
                ->references('artikel_id')
                ->on('artikels')
                ->onDelete('cascade');

            $table->unsignedBigInteger('winkel_id');
            $table->foreign('winkel_id')
                ->references('winkel_id')
                ->on('winkels')
                ->onDelete('cascade');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->integer('aantal');
            $table->double('prijs');
            $table->integer('totaal');
            $table->string('afgehaald')->default('nee');
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
        Schema::dropIfExists('bestelling');
    }
}
