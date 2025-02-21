<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('hasil_pengajuan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pengajuan_beasiswa')->constrained('pengajuan_beasiswa')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->decimal('skor', 8, 3);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hasil_pengajuan');
    }
};
