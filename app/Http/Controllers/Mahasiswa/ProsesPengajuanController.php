<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\HasilPengajuan;
use Illuminate\Http\Request;

class ProsesPengajuanController extends Controller
{
    public function index(Request $request)
    {
        // Ambil semua data pengajuan beasiswa, diurutkan berdasarkan skor tertinggi
        $hasilPengajuan = HasilPengajuan::with('user')
            ->orderByDesc('skor') // Urutkan berdasarkan skor tertinggi
            ->paginate(15); // Batasi 15 data per halaman

        return view('pages.mahasiswa.proses-pengajuan.index', compact('hasilPengajuan'));
    }
}