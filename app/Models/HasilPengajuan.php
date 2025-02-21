<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class HasilPengajuan extends Model
{
    use HasFactory;

    protected $table = 'hasil_pengajuan';
    protected $guarded = ['id'];
    protected $fillable = ['user_id', 'id_pengajuan_beasiswa', 'skor', 'status_penerimaan'];

    // Relasi ke tabel pengajuan beasiswa
    public function pengajuan()
    {
        return $this->belongsTo(PengajuanBeasiswa::class, 'id_pengajuan_beasiswa');
    }

    // Relasi ke tabel users
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
