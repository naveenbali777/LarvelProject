<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnInFolderpermission extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('folder_permission', function (Blueprint $table) {
            $table->unsignedInteger('given_by_userid')->after('folder_id');
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
            $table->dropColumn('given_by_userid');
        });
    }
}
