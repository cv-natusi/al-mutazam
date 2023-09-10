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
        Schema::create('mst_pelajaran', function (Blueprint $table) {
            $table->bigIncrements('id_pelajaran');
            $table->string('nama_mapel');
            $table->integer('kelas_id');
            $table->string('ta');
            $table->string('semester');
            $table->integer('guru_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mst_pelajaran');
    }
};
