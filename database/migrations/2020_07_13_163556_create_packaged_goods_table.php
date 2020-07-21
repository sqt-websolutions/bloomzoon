<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagedGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packaged_goods', function (Blueprint $table) {
            $table->id();
            $table->text('storage_location');
            $table->text('description');
            $table->text('time_in');
            $table->unsignedInteger('order_id');
            $table->text('sender_name');


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
        Schema::dropIfExists('packaged_goods');
    }
}
