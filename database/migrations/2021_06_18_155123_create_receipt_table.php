<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceiptTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receipt', function (Blueprint $table) {
            $table->increments('idReceipt');
            $table->integer('idUser')->unsigned();
            $table->foreign('idUser')->references('idUser')->on('users');
            $table->dateTime('receiptDate', $precision = 0);
            $table->tinyInteger('payment');
            $table->string('phone')->default(0);
            $table->string('address')->default(0);
            $table->string('name')->default(0);
            $table->text('note')->nullable();
            $table->integer('idPromotion')->unsigned()->default(0)->nullable();
            $table->foreign('idPromotion')->references('idPromotion')->on('promotion');
            $table->tinyInteger('status')->default(1);
            $table->integer('total')->default(0);
            $table->boolean('isWeeklyBook')->default(false);
            $table->integer('idDetailWeeklyBook')->unsigned()->default(0)->nullable();
            $table->foreign('idDetailWeeklyBook')->references('idDetailWeeklyBook')->on('detail_weekly_book');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('receipt');
    }
}
