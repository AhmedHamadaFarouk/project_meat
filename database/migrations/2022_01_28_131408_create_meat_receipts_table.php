<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeatReceiptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meat_receipts', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->date('start_date_slaughter');
            $table->date('end_date_slaughter');
            $table->string('name_slaughterhouse');
            $table->string('permit_number');
            $table->string('before_receiving')->comment('الوزن قبل الاستلام');
            $table->string('after_receiving')->comment('الوزن بعد الاستلام');
            $table->string('jolly')->comment('الخيسه');
            $table->string('operative_number'); // رقم التشغليه
            $table->enum('type',array('identical','Not_matching'))->comment('مطايق');
            $table->string('meat_temp')->comment('درجه الحراره');
            $table->enum('meat_color',array('acceptable','Unacceptable'));
            $table->enum('meat_smell',array('acceptable','Unacceptable'));
            $table->enum('meat_texture',array('acceptable','Unacceptable'));
            $table->text('notes')->nullable();
            $table->text('photo')->nullable();
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
        Schema::dropIfExists('meat_receipts');
    }
}
