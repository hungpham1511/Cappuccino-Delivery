<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu', function (Blueprint $table) {
            $table->increments('idDrink');
            $table->string('name', 50);
            $table->string('category', 50);
            $table->string('picture');
            $table->string('description');
            $table->decimal('price', 10)->default(0);
<<<<<<< HEAD
            $table->timestamps();
            
=======
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
>>>>>>> 7c49aae (Fix phone number)
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu');
    }
}
