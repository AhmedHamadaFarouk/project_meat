<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeletliesMeatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deletlies_meats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('meat_toxin_id')->references('id')->on('meat_toxins')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('type');
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
        Schema::dropIfExists('deletlies_meats');
    }
}
