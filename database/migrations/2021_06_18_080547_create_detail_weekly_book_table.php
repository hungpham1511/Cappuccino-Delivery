<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailWeeklyBookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_weekly_book', function (Blueprint $table) {
            $table->increments('idDetailWeeklyBook');
            $table->date('startDay');
            $table->date('finishDay');
            $table->time('deliveryTime',$precision=0);
            $table->tinyInteger('mon');
            $table->tinyInteger('tue');
            $table->tinyInteger('wed');
            $table->tinyInteger('thu');
            $table->tinyInteger('fri');
            $table->tinyInteger('sat');
            $table->tinyInteger('sun');
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
        Schema::dropIfExists('weekly_book');
    }
}
