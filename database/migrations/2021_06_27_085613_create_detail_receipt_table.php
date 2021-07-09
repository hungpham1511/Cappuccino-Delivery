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
            $table->foreign('idReceipt')->references('idReceipt')->on('receipt');
            $table->integer('amount');
            $table->integer('sugar')->nullable();
            $table->integer('ice')->nullable();
            $table->tinyInteger('size');
            $table->decimal('price', 22)->default(0.00);
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
        Schema::dropIfExists('detail_receipt');
    }
}
