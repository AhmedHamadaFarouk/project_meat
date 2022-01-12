<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDispensePackingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dispense_packings', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->date('supplydate');
            $table->string('workordernumber');
            $table->enum('type',array('acceptable','unacceptable'));
            $table->foreignId('product_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('Quantity');
            $table->string('codeProduct'); // سيتم الاضافه الي اضافه الصنف
            $table->string('batchNumber');
            $table->text('notes')->nullable();
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
        Schema::dropIfExists('dispense_packings');
    }
}
