<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromotionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotion', function (Blueprint $table) {
            $table->increments('idPromotion');
            $table->tinyInteger('promotionType');
            $table->string('promotionCode');
            $table->integer('percentPromo');
            $table->decimal('moneyPromo', 10)->default(0.00);
            $table->decimal('moneyLimit', 10)->default(0.00);
            $table->datetime('expireDay');
            $table->boolean('status');
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
        Schema::dropIfExists('promotion');
    }
}
