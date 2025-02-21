<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PengajuanBeasiswa extends Model
{
    use HasFactory;

    protected $table = 'pengajuan_beasiswa';
    protected $guarded = ['id'];

    public function pengaju()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Akses path file di storage.
     */
    public function getFilePath($field)
    {
        if ($this->$field) {
            return asset('storage/' . $this->$field);
        }
        return null;
    }
}
