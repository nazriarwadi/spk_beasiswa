<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenerimaanBeasiswa extends Model
{
    use HasFactory;

    protected $table = 'penerimaan_beasiswa';

    protected $fillable = [
        'jumlah_penerima',
        'minimal_skor',
    ];
}