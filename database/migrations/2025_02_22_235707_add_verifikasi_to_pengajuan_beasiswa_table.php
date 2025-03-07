<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVerifikasiToPengajuanBeasiswaTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('pengajuan_beasiswa', function (Blueprint $table) {
            // Tambahkan kolom `verifikasi` setelah kolom `jumlah_tanggungan`
            $table->tinyInteger('verifikasi')->default(0)->after('jumlah_tanggungan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pengajuan_beasiswa', function (Blueprint $table) {
            // Hapus kolom `verifikasi` jika migration di-rollback
            $table->dropColumn('verifikasi');
        });
    }
}