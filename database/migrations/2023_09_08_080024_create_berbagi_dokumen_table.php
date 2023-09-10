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
        Schema::create('berbagi_dokumen', function (Blueprint $table) {
            $table->bigIncrements('id_berbagi_dokumen');
            $table->string('tahun_ajaran');
            $table->string('semester');
            $table->string('nama_dokumen');
            $table->string('file_dokumen')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('berbagi_dokumen');
    }
};
