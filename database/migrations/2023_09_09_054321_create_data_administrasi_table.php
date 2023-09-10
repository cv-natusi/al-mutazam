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
        Schema::create('data_administrasi', function (Blueprint $table) {
            $table->bigIncrements('id_administrasi');
            $table->string('nama_berkas');
            $table->string('keterangan');
            $table->string('tanggal_upload');
            $table->string('file')->nullable();
            $table->string('status')->comment('0=ditolak, 1=dibuat/menunggu, 2=terverifikasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_administrasi');
    }
};
