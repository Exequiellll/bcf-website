<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('announcements', function (Blueprint $table) {
            $table->dateTime('event_date')->nullable()->after('content');
            $table->index('event_date');
        });

        Schema::table('schedules', function (Blueprint $table) {
            $table->dateTime('event_date')->nullable()->after('description');
            $table->index('event_date');
        });
    }

    public function down(): void
    {
        Schema::table('announcements', function (Blueprint $table) {
            $table->dropIndex(['event_date']);
            $table->dropColumn('event_date');
        });

        Schema::table('schedules', function (Blueprint $table) {
            $table->dropIndex(['event_date']);
            $table->dropColumn('event_date');
        });
    }
};
