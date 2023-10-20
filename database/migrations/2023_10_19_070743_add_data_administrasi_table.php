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
        Schema::table('data_administrasi', function (Blueprint $table) {
            $table->string('tahun_ajaran');
            $table->string('semester');
            $table->text('keterangan_tolak')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('data_administrasi', function (Blueprint $table) {
            $table->dropColumn('tahun_ajaran');
            $table->dropColumn('semester');
            $table->dropColumn('keterangan_tolak');
        });
    }
};
