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
        Schema::create('detail_data_penugasan_guru', function (Blueprint $table) {
            $table->bigIncrements('id_detail_data_penugasan');
            $table->integer('guru_id');
            $table->integer('tugas_tambahan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_data_penugasan_guru');
    }
};
