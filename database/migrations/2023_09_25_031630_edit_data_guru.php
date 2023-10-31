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
        Schema::table('data_guru', function (Blueprint $table)  {
            $table->string('alamat')->nullable()->change();
            $table->string('file_tmt_guru')->nullable();
            $table->string('file_tmt_petugas')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('data_guru', function (Blueprint $table)  {
            $table->string('alamat')->change();
            $table->dropColumn('file_tmt_guru');
            $table->dropColumn('file_tmt_petugas');
        });
    }
};
