<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserInviteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_invites', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->index();
            $table->string('relation');
            $table->unsignedInteger('invited_by')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedTinyInteger('status')->default(0);
            $table->string('token')->index()->unique();
            $table->timestamp('invite_on');
            $table->softDeletes();
            $table->timestamps();


            $table->foreign('invited_by')
                  ->references('id')
                  ->on('users')
                  ->onDelete('set null');

            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
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
        Schema::dropIfExists('user_invites');
    }
}
