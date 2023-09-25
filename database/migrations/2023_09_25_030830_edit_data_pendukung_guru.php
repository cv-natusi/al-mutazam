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
        Schema::table('data_pendukung_guru', function(Blueprint $table) {
            $table->renameColumn('file_sertifikat_pendidik', 'file_sk');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('data_pendukung_guru', function(Blueprint $table) {
            $table->renameColumn('file_sk','file_sertifikat_pendidik');
        });
    }
};
