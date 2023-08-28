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
        Schema::create('datapelajaran', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pelajaran');
            $table->date('kelas');
            $table->string('ta');
            $table->string('semester');
            $table->string('guru_pengajar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datapelajaran');
    }
};
