<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnInFolderpermisssion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('folder_permission', function (Blueprint $table) {
            $table->unsignedInteger('invite_id')->after('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('folder_permission', function (Blueprint $table) {
            $table->dropColumn('invite_id');
        });
    }
}
