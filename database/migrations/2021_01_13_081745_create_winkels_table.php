<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWinkelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('winkels', function (Blueprint $table) {
            $table->bigIncrements('winkel_id');
            $table->string('winkelnaam');
            $table->string('adres');
            $table->string('postcode');
            $table->string('plaats');
            $table->integer('telefoonnummer');
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
        Schema::dropIfExists('winkel');
    }
}
