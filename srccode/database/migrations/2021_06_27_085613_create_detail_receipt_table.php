<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailReceiptTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_receipt', function (Blueprint $table) {
            $table->increments('idDetailReceipt');
            $table->integer('idDrink')->unsigned();
            $table->integer('idReceipt')->unsigned();
            $table->foreign('idDrink')->references('idDrink')->on('Menu');
            $table->foreign('idReceipt')->references('idReceipt')->on('Receipt');
            $table->integer('Amount');
            $table->integer('Sugar')->nullable();
            $table->integer('Ice')->nullable();
            $table->tinyInteger('Size');
            $table->text('DrinkNote');
            $table->decimal('Price', 22)->default(0.00);
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
        Schema::dropIfExists('detail_receipt');
    }
}
