<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameColumnChangeTypeInFolderpermission extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('folder_permission', function (Blueprint $table) {
            $table->unsignedInteger('folder_ids')->change();
            $table->renameColumn('folder_ids','folder_id');
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
            $table->renameColumn('folder_id','folder_ids');
        });
    }
}
