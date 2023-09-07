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
        Schema::create('data_guru', function (Blueprint $table) {
            $table->bigIncrements('id_guru');
            $table->string('nama');
            $table->string('nik');
            $table->string('nip')->nullable();
            $table->string('nuptk')->nullable();
            $table->string('ptkid')->nullable();
            $table->string('nrg_npk')->nullable();
            $table->string('tmt_pegawai')->nullable();
            $table->string('tmt_guru')->nullable();
            $table->string('email')->nullable();
            $table->string('email_madrasah')->nullable();
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('alamat');
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_guru');
    }
};
