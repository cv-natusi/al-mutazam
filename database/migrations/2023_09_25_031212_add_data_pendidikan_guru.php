<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('data_pendidikan_guru', function(Blueprint $table) {
            $table->string('file_sertifikasi')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('data_pendidikan_guru', function(Blueprint $table) {
            $table->dropColumn('file_sertifikasi');
        });
    }
};
