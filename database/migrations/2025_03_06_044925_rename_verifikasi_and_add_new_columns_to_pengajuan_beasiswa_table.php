<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameVerifikasiAndAddNewColumnsToPengajuanBeasiswaTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('pengajuan_beasiswa', function (Blueprint $table) {
            // Hapus kolom `verifikasi` yang lama
            $table->dropColumn('verifikasi');

            // Tambahkan kolom baru untuk verifikasi per-file
            $table->tinyInteger('verifikasi_dtks')->default(0)->after('jumlah_tanggungan');
            $table->tinyInteger('verifikasi_p3ke')->default(0)->after('verifikasi_dtks');
            $table->tinyInteger('verifikasi_kip')->default(0)->after('verifikasi_p3ke');
            $table->tinyInteger('verifikasi_kks')->default(0)->after('verifikasi_kip');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pengajuan_beasiswa', function (Blueprint $table) {
            // Hapus kolom-kolom baru jika migration di-rollback
            $table->dropColumn(['verifikasi_dtks', 'verifikasi_p3ke', 'verifikasi_kip', 'verifikasi_kks']);

            // Tambahkan kembali kolom `verifikasi` yang lama
            $table->tinyInteger('verifikasi')->default(0)->after('jumlah_tanggungan');
        });
    }
}