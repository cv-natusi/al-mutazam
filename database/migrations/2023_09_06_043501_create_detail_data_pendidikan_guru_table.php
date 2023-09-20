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
        Schema::create('detail_data_pendidikan_guru', function (Blueprint $table) {
            $table->bigIncrements('id_detail_data_pendidikan');
            $table->integer('guru_id');
            $table->integer('mata_pelajaran');
            $table->string('jumlah_jam');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_data_pendidikan_guru');
    }
};
