<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoffeePartnerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coffee_partner', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->integer('product_id');
            $table->decimal('total_credits')->default(0);
            $table->decimal('farmer_credits')->default(0);

            $table->foreign('product_id')
              ->references('id')
              ->on('products')
              ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coffee_partner');
    }
}
