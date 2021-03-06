<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderPastsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_pasts', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('order_id');
            $table->integer('user_id');
            $table->float('price');
            $table->string('client');
            $table->decimal('profit', 5, 5);
            $table->string('status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_pasts');
    }
}
