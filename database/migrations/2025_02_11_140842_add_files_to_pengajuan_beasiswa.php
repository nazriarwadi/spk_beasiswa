<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migration untuk menambah kolom file.
     */
    public function up(): void
    {
        Schema::table('pengajuan_beasiswa', function (Blueprint $table) {
            $table->string('file_status_dtks')->nullable()->after('status_dtks'); // File untuk Status DTKS
            $table->string('file_status_p3ke')->nullable()->after('status_p3ke'); // File untuk Status P3KE
            $table->string('file_nomor_kip')->nullable()->after('nomor_kip'); // File untuk Nomor KIP
            $table->string('file_nomor_kks')->nullable()->after('nomor_kks'); // File untuk Nomor KKS
        });
    }

    /**
     * Rollback migration (menghapus kolom file jika diperlukan).
     */
    public function down(): void
    {
        Schema::table('pengajuan_beasiswa', function (Blueprint $table) {
            $table->dropColumn(['file_status_dtks', 'file_status_p3ke', 'file_nomor_kip', 'file_nomor_kks']);
        });
    }
};
