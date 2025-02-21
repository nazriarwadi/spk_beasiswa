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
        Schema::create('pengajuan_beasiswa', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users', 'id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('status_dtks');
            $table->string('status_p3ke');
            $table->string('nomor_kip');
            $table->string('nomor_kks');
            $table->string('nama_ayah');
            $table->string('status_ayah');
            $table->string('pekerjaan_ayah');
            $table->string('nama_ibu');
            $table->string('status_ibu');
            $table->string('pekerjaan_ibu');
            $table->string('jumlah_tanggungan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan_beasiswa');
    }
};
