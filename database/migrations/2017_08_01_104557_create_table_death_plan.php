<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDeathPlan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('death_plan_trigger', function (Blueprint $table) {
            $table->increments('id');            
            $table->unsignedInteger('user_id');
            $table->string('opt',50);
            $table->enum('status', ['inactive', 'active'])->default('inactive');
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
        Schema::dropIfExists('death_plan_trigger');
    }
}
