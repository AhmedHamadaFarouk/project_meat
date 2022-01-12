<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExchangeRawMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exchange_raw_materials', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('codeJop')->comment('رقم امر الشغل');
            $table->foreignId('product_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('Quantity');
            $table->string('codeProduct'); // سيتم الاضافه الي اضافه الصنف
            $table->string('batchNumber');
            $table->date('dataProduction');
            $table->date('dataFinished');
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
        Schema::dropIfExists('exchange_raw_materials');
    }
}
