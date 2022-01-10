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
            // Error
            $table->string('Virtual_scan')->comment('الفحص الظاهري');
            $table->enum('type',array('acceptable','Unacceptable'));
            $table->string('number_ear');
            $table->text('notes');
            $table->string('quantity')->comment('الكمية المستلمه من اذن الذبح');
            $table->string('slaughterhouse')->comment('سم المجزر');
            $table->foreignId('product_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('examination_receipts');
    }
}
