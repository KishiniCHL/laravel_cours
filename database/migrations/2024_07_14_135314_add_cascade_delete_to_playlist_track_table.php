<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Drop existing foreign key constraints
        Schema::table('playlist_track', function (Blueprint $table) {
            $table->dropForeign(['playlist_id']);
            $table->dropForeign(['track_id']);
        });

        // Re-add foreign key constraints with cascade delete
        Schema::table('playlist_track', function (Blueprint $table) {
            $table->foreign('playlist_id')->references('id')->on('playlists')->onDelete('cascade');
            $table->foreign('track_id')->references('id')->on('tracks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('playlist_track', function (Blueprint $table) {
            $table->dropForeign(['playlist_id']);
            $table->dropForeign(['track_id']);
        });
        
        Schema::table('playlist_track', function (Blueprint $table) {
            $table->foreign('playlist_id')->references('id')->on('playlists');
            $table->foreign('track_id')->references('id')->on('tracks');
        });
    }
};