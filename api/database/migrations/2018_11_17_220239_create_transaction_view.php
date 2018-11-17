<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("CREATE VIEW transaction AS
                       SELECT concat(users.first_name, ' ', users.last_name) AS customer_name,
                              th.id AS transaction_id,
                              ti.id AS transaction_item_id,
                              products.product_name AS product_name,
                              products.price,
                              products.grams_used,
                              addresses.name AS address
                       FROM transaction_history th
                       LEFT JOIN users ON th.user_id = users.id
                       LEFT JOIN addresses ON th.address_id = addresses.id
                       LEFT JOIN transaction_items ti ON th.id = ti.transaction_history_id
                       LEFT JOIN products ON ti.product_id = products.id");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP VIEW IF EXISTS transaction');
    }
}
