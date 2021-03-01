<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBestellingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bestelling', function (Blueprint $table) {
            $table->unsignedBigInteger('artikel_id');
            $table->foreign('artikel_id')
                ->references('artikel_id')
                ->on('artikels')
                ->onDelete('cascade');

            $table->unsignedBigInteger('winkel_id');
            $table->foreign('winkel_id')
                ->references('winkel_id')
                ->on('winkel')
                ->onDelete('cascade');

            $table->unsignedBigInteger('id');
            $table->foreign('id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->integer('aantal');
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
