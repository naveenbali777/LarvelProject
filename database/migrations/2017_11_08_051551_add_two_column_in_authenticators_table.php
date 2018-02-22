<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTwoColumnInAuthenticatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('authenticators', function (Blueprint $table) {
            $table->string('verify_code', 100)->nullable()->after('type');
            $table->tinyInteger('verify_user_death')->default(0)->after('type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('authenticators', function (Blueprint $table) {
            $table->dropColumn('verify_code');
            $table->dropColumn('verify_user_death');
        });
    }
}
