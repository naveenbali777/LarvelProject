<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuthenticateAccountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('authenticate_account', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('main_user_id');
            $table->unsignedInteger('authenticator_id');
            $table->unsignedInteger('authenticator_user_id')->nullable();
            $table->string('token', 20)->nullable();
            $table->string('otp', 10)->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('authenticate_account');
    }
}