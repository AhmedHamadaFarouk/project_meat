<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCleaningDisinfectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cleaning_disinfections', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            // $table->foreignId('product_id')->constrained('products')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('product_id')->references('id')->on('products')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('Quantity');
            $table->string('codeProduct'); // سيتم الاضافه الي اضافه الصنف
            $table->string('batchNumber');
            $table->date('dataProduction');
            $table->date('dataFinished');
            $table->integer('PH');
            $table->text('notes')->nullable();
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
        Schema::dropIfExists('cleaning_disinfections');
    }
}
