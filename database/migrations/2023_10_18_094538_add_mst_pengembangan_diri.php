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
        Schema::table('mst_pengembangan_diri', function (Blueprint $table) {
            $table->string('tahun_ajaran');
            $table->string('semester');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mst_pengembangan_diri', function (Blueprint $table) {
            $table->dropColumn('tahun_ajaran');
            $table->dropColumn('semester');
        });
    }
};
