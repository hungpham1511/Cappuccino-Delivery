<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailToppingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_topping', function (Blueprint $table) {
            $table->increments('idDetailTopping');
            $table->integer('idTopping')->unsigned();
            $table->integer('idDetailReceipt')->unsigned();
            $table->foreign('idTopping')->references('idTopping')->on('topping');
            $table->foreign('idDetailReceipt')->references('idDetailReceipt')->on('detail_receipt');
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
        Schema::dropIfExists('detail_topping');
    }
}
