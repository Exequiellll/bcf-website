<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('announcements', function (Blueprint $table) {
            $table->index('is_published');
            $table->index('published_at');
        });

        Schema::table('events', function (Blueprint $table) {
            $table->index('event_date');
            $table->index('is_published');
        });
    }

    public function down(): void
    {
        Schema::table('announcements', function (Blueprint $table) {
            $table->dropIndex(['is_published']);
            $table->dropIndex(['published_at']);
        });

        Schema::table('events', function (Blueprint $table) {
            $table->dropIndex(['event_date']);
            $table->dropIndex(['is_published']);
        });
    }
};
