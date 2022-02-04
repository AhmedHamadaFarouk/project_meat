<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeatToxinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meat_toxins', function (Blueprint $table) {
            $table->id();
            $table->string('type_meat');
            $table->string('receipt_code');
            $table->text('photo');
            $table->foreignId('meat_receipt_id')->references('id')->on('meat_receipts')->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('meat_toxins');
    }
}
