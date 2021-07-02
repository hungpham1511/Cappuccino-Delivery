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
            $table->integer('IdDetailReceipt')->unsigned()->default(0);
            $table->foreign('IdDetailReceipt')->references('IdDetailReceipt')->on('detail_receipt');
            $table->dateTime('receiptDate', $precision = 0);
            $table->tinyInteger('payment');
            $table->text('note');
            $table->integer('idPromotion')->unsigned()->default(0);
            $table->foreign('idPromotion')->references('idPromotion')->on('promotion');
            $table->tinyInteger('status');
            $table->decimal('total', 10)->default(0.00);
            $table->boolean('isWeeklyBook')->default(false);
            $table->integer('idDetailWeeklyBook')->unsigned()->default(0);
            $table->foreign('idDetailWeeklyBook')->references('idDetailWeeklyBook')->on('detail_weekly_book');
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
        Schema::dropIfExists('receipt');
    }
}
