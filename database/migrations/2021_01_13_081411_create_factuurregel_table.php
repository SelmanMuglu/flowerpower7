<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFactuurregelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factuurregel', function (Blueprint $table) {
            $table->unsignedBigInteger('factuur_id');
            $table->foreign('factuur_id')
                ->references('factuur_id')
                ->on('factuur')
                ->onDelete('cascade');

            $table->unsignedBigInteger('artikel_id');
            $table->foreign('artikel_id')
                ->references('artikel_id')
                ->on('artikels')
                ->onDelete('cascade');

            $table->integer('aantal');
            $table->double('prijs', 10,2);
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
        Schema::dropIfExists('factuurregel_');
    }
}
