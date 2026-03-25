<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddReadAtToCommunitySignupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('community_signups', function (Blueprint $table) {
            $table->timestamp('read_at')->nullable()->after('notified');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('community_signups', function (Blueprint $table) {
            $table->dropColumn('read_at');
        });
    }
}
