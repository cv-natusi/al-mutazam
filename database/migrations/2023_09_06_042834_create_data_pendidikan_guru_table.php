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
        Schema::create('data_pendidikan_guru', function (Blueprint $table) {
            $table->bigIncrements('id_data_pendidikan');
            $table->integer('guru_id');
            $table->string('potensi_bidang')->nullable();
            $table->string('no_sertifikat_pendidik')->nullable();
            $table->string('sertifikasi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_pendidikan_guru');
    }
};
