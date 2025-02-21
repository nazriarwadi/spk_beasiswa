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
        Schema::table('users', function (Blueprint $table) {
            $table->string('nik')->nullable();
            $table->string('no_kk')->nullable();
            $table->string('nik_kk')->nullable();
            $table->string('nisn')->nullable();
            $table->string('asal_sekolah')->nullable();
            $table->string('kab_kota_sekolah')->nullable();
            $table->string('provinsi_sekolah')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->string('tanggal_lahir')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('alamat_tinggal')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('nik');
            $table->dropColumn('no_kk');
            $table->dropColumn('nik_kk');
            $table->dropColumn('nisn');
            $table->dropColumn('asal_sekolah');
            $table->dropColumn('kab_kota_sekolah');
            $table->dropColumn('provinsi_sekolah');
            $table->dropColumn('tempat_lahir');
            $table->dropColumn('tanggal_lahir');
            $table->dropColumn('jenis_kelamin');
            $table->dropColumn('alamat_tinggal');
            $table->dropColumn('no_hp');
            $table->dropColumn('email_verified_at');
        });
    }
};
