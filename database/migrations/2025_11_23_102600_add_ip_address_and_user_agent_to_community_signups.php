<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIpAddressAndUserAgentToCommunitySignups extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('community_signups', function (Blueprint $table) {
            $table->string('ip_address', 45)->nullable()->after('phone');
            $table->text('user_agent')->nullable()->after('ip_address');
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
            $table->dropColumn(['ip_address', 'user_agent']);
        });
    }
}
