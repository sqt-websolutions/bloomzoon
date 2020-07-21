<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id()->unsigned();
            $table->integer('buyer_id')->nullable();
            $table->integer('total_amount');
            $table->string('status')->default('new')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('delivery_agent_id')->nullable();
            $table->integer('payment_method')->unsigned();
            $table->integer('payment_id')->nullable();
            $table->longText('order_notes')->nullable();
            $table->integer('delivery_fee')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
