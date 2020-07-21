<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->string('address');
            $table->string('state')->nullable();
            $table->string('region')->nullable();
            $table->string('featured_img_url');
            $table->string('service_type');
            $table->string('service_category')->nullable();
            $table->unsignedInteger('user_id');
            $table->string('identity_file_url');
            $table->string('delivery_mode');
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
        Schema::dropIfExists('vendors');
    }
}
