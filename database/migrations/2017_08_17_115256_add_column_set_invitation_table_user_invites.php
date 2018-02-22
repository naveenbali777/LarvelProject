<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnSetInvitationTableUserInvites extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_invites', function (Blueprint $table) {
            $table->string('invite_on')->nullable()->change();
            $table->enum('set_invitation', ['now', 'later', 'hereafter'])->nullable()->after('invite_on');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_invites', function (Blueprint $table) {
            $table->dropColumn('set_invitation');
        });
    }
}
