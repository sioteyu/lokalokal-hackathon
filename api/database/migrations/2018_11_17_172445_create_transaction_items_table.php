<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('transaction_history_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->integer('quantity');

            $table->foreign('transaction_history_id')
              ->references('id')
              ->on('transaction_history')
              ->onDelete('cascade');

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
        Schema::dropIfExists('transaction_items');
    }
}
