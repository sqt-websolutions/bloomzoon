<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('operating_currency')->nullable();
            $table->string('account_type');
            $table->timestamp('email_verified_at')->nullable();
            $table->longText('billing_address')->nullable();
            $table->string('phone');
            $table->string('password');
            $table->dateTime('last_login')->nullable();
            $table->integer('pin')->nullable();
            $table->integer('points')->nullable();
            $table->integer('agent_id')->nullable();
            $table->longText('address')->nullable();
            $table->integer('zip_code')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('company_name')->nullable();
            $table->longText('profile_pic_url')->nullable();
            $table->integer('stage')->nullable();
            $table->longText('service_description')->nullable();
            $table->string('company_profile')->nullable();
            $table->string('terms_conditions')->nullable();
            $table->string('terms_of_purchase')->nullable();
            $table->string('policy')->nullable();
            $table->mediumText('state')->nullable();
            $table->integer('status')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
