<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExaminationReceiptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examination_receipts', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->date('slaughter_date')->comment('تاريخ الدبح');
            $table->string('number_ear');
            $table->string('meat_temp')->comment('درجه الحراره');
            $table->enum('meat_color',array('acceptable','Unacceptable'));
            $table->enum('meat_smell',array('acceptable','Unacceptable'));
            $table->enum('meat_texture',array('acceptable','Unacceptable'));
            $table->foreignId('store_id')->references('id')->on('stores')->cascadeOnDelete()->cascadeOnUpdate()->comment('اسم المخزن');
            $table->foreignId('supplier_id')->references('id')->on('suppliers')->cascadeOnDelete()->cascadeOnUpdate()->comment('اسم المورد');
            $table->foreignId('product_id')->references('id')->on('products')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('quantity')->comment('الكمية المستلمه من اذن الذبح');
            $table->text('notes')->nullable();
            $table->text('photo')->nullable();
            // $table->foreignId('product_id')->constrained('products')->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('examination_receipts');
    }
}
