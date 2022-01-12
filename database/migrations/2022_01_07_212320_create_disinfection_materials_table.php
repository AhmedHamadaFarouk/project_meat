<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisinfectionMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disinfection_materials', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            // $table->foreignId('product_id')->constrained('products')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('product_id')->references('id')->on('products')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('Quantity');
            $table->string('codeProduct'); // سيتم الاضافه الي اضافه الصنف
            $table->string('batchNumber');
            $table->date('dataProduction');
            $table->date('dataFinished');
            $table->enum('type',array('acceptable','unacceptable'));
            $table->text('photo')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('disinfection_materials');
    }
}
