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
        Schema::create('data_pendukung_guru', function (Blueprint $table) {
            $table->bigIncrements('id_data_pendukung');
            $table->integer('guru_id');
            $table->string('file_ktp');
            $table->string('file_kk');
            $table->string('file_sertifikat_pendidik')->nullable();
            $table->string('ijazah_terakhir');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_pendukung_guru');
    }
};
