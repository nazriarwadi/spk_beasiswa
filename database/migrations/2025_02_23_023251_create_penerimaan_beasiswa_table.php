<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenerimaanBeasiswaTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('penerimaan_beasiswa', function (Blueprint $table) {
            $table->id(); // Kolom ID sebagai primary key
            $table->integer('jumlah_penerima')->unsigned(); // Jumlah penerima (positif)
            $table->decimal('minimal_skor', 5, 2)->unsigned(); // Minimal skor (desimal, maksimal 999.99)
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penerimaan_beasiswa');
    }
}