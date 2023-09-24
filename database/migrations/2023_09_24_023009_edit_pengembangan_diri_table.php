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
        Schema::table('pengembangan_diri', function (Blueprint $table) {
            $table->integer('mst_pengembangan_diri_id')->nullable()->change();
            $table->string('keterangan_tolak')->nullable();
            $table->string('nama_kegiatan')->nullable();
            $table->date('tgl_mulai')->nullable();
            $table->date('tgl_selesai')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pengembangan_diri', function (Blueprint $table) {
            $table->integer('mst_pengembangan_diri_id')->change();
            $table->dropColumn('keterangan_tolak');
            $table->dropColumn('nama_kegiatan');
            $table->dropColumn('tgl_mulai');
            $table->dropColumn('tgl_selesai');
        });
    }
};
