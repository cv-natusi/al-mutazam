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
        Schema::create('guru', function (Blueprint $table) {
            $table->id('id_guru');
            $table->string('id_users');
            $table->string('nama_guru');
            $table->string('nip');
            $table->string('nik');
            $table->date('tanggal_lahir');
            $table->string('foto');
            $table->string('usia');
            $table->string('alamat');
            $table->string('provinsi');
            $table->string('kabupaten');
            $table->string('kecamatan');
            $table->string('desa_kelurahan');
            $table->string('telepon');
            $table->string('tugas_utama');
            $table->string('tugas_tambahan');
            $table->string('subminkal');
            $table->date('tmta');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guru');
    }
};
