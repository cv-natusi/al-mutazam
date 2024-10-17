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
        Schema::create('pengembangan_diri', function (Blueprint $table) {
            $table->bigIncrements('id_pengembangan_diri');
            $table->integer('guru_id');
            $table->integer('mst_pengembangan_diri_id');
            $table->string('file')->nullable();
            $table->string('tahun',10)->nullable();
            $table->string('status',50)->nullable()->comment('buat','upload','verif','tolak');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengembangan_diri');
    }
};
