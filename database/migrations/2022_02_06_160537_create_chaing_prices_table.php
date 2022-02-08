<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChaingPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chaing_prices', function (Blueprint $table) {
            $table->id();
            $table->string('type_test');
            $table->string('meat_toxin_id')->nullable();
            $table->string('amount');
            $table->string('weight');
            $table->string('testicle');
            $table->string('price')->nullable();
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
        Schema::dropIfExists('chaing_prices');
    }
}
