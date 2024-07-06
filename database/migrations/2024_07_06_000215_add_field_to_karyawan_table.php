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
        Schema::table('karyawan', function (Blueprint $table) {
            $table->string('perilaku')->after('email')->nullable();
            $table->string('kehadiran')->after('perilaku')->nullable();
            $table->string('masa_kerja')->after('kehadiran')->nullable();
            $table->string('pendidikan')->after('masa_kerja')->nullable();
            $table->string('pencapaian_target')->after('pendidikan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('karyawan', function (Blueprint $table) {
            $table->dropColumn(['perilaku', 'kehadiran', 'masa_kerja', 'pendidikan', 'pencapaian_target']);
        });
    }
};
