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
        Schema::create('departemens', function (Blueprint $table) {
            $table->id();
            $table->string('nama_departemen');
            $table->string('deskripsi')->nullable();
            $table->timestamps();
        });

        // Tambahkan kolom departemen_id ke tabel karyawans
        Schema::table('karyawans', function (Blueprint $table) {
            $table->foreignId('departemen_id')->nullable()->constrained('departemens')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('karyawans', function (Blueprint $table) {
            $table->dropForeign(['departemen_id']);
            $table->dropColumn('departemen_id');
        });

        Schema::dropIfExists('departemens');
    }
};
