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
        Schema::create('mst_guru', function (Blueprint $table) {
            $table->bigIncrements('id_guru');
            $table->string('nik');
            $table->string('nip')->nullable();
            $table->string('nama');
            $table->date('tanggal_lahir');
            $table->string('foto')->nullable();
            $table->string('alamat');
            $table->string('provinsi_id');
            $table->string('kabupaten_id');
            $table->string('kecamatan_id');
            $table->string('desa_id');
            $table->string('telepon');
            $table->string('email')->nullable();
            $table->integer('tugas_utama');
            $table->string('tugas_tambahan')->nullable();
            $table->string('subminkal')->nullable();
            $table->string('tmta_awal')->nullable();
            $table->boolean('status_guru')->comment('true=aktif, false=tidak aktif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mst_guru');
    }
};
