<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('hasil_pengajuan', function (Blueprint $table) {
            // Tambahkan kolom status_penerimaan
            $table->string('status_penerimaan')->nullable()->after('skor');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('hasil_pengajuan', function (Blueprint $table) {
            // Hapus kolom status_penerimaan jika migration di-rollback
            $table->dropColumn('status_penerimaan');
        });
    }
};