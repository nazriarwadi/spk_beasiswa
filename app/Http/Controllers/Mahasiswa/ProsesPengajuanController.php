<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\HasilPengajuan;
use App\Models\PenerimaanBeasiswa; // Import model PenerimaanBeasiswa
use Illuminate\Support\Facades\Auth;

class ProsesPengajuanController extends Controller
{
    public function index()
    {
        // Ambil ID pengguna saat ini
        $userId = Auth::id();

        // Cek apakah pengajuan milik pengguna saat ini sudah diverifikasi
        $pengajuanUser = HasilPengajuan::where('user_id', $userId)
            ->with('pengajuan')
            ->first();

        // Inisialisasi variabel untuk pesan verifikasi
        $pesanVerifikasi = null;

        // Periksa apakah pengajuan ditemukan
        if ($pengajuanUser) {
            // Periksa apakah ada verifikasi yang belum selesai (nilai 0 atau 1)
            if (
                $pengajuanUser->pengajuan->verifikasi_dtks == 0 ||
                $pengajuanUser->pengajuan->verifikasi_p3ke == 0 ||
                $pengajuanUser->pengajuan->verifikasi_kip == 0 ||
                $pengajuanUser->pengajuan->verifikasi_kks == 0
            ) {
                // Jika ada verifikasi yang bernilai 0, tampilkan pesan
                $pesanVerifikasi = 'Proses pengajuan kamu belum sepenuhnya diverifikasi. Mohon ditunggu verifikasi oleh admin.';
                return view('pages.mahasiswa.proses-pengajuan.index', compact('pesanVerifikasi'));
            }

            // Periksa apakah ada verifikasi yang ditolak (nilai 1)
            if (
                $pengajuanUser->pengajuan->verifikasi_dtks == 1 ||
                $pengajuanUser->pengajuan->verifikasi_p3ke == 1 ||
                $pengajuanUser->pengajuan->verifikasi_kip == 1 ||
                $pengajuanUser->pengajuan->verifikasi_kks == 1
            ) {
                // Jika ada verifikasi yang ditolak, tampilkan pesan
                $pesanVerifikasi = 'Maaf, pengajuan kamu tidak dapat diproses karena ada verifikasi yang ditolak.';
                return view('pages.mahasiswa.proses-pengajuan.index', compact('pesanVerifikasi'));
            }
        } else {
            // Jika pengajuan tidak ditemukan
            $pesanVerifikasi = 'Data pengajuan tidak ditemukan.';
            return view('pages.mahasiswa.proses-pengajuan.index', compact('pesanVerifikasi'));
        }

        // Jika pengajuan milik pengguna sudah diverifikasi, tampilkan semua data yang sudah diverifikasi
        $hasilPengajuan = HasilPengajuan::with(['user', 'pengajuan']) // Muat relasi user dan pengajuan
            ->whereHas('pengajuan', function ($query) {
                $query->where('verifikasi_dtks', 2) // Hanya tampilkan jika verifikasi_dtks = 2
                    ->where('verifikasi_p3ke', 2) // Hanya tampilkan jika verifikasi_p3ke = 2
                    ->where('verifikasi_kip', 2) // Hanya tampilkan jika verifikasi_kip = 2
                    ->where('verifikasi_kks', 2); // Hanya tampilkan jika verifikasi_kks = 2
            })
            ->orderByDesc('skor') // Urutkan berdasarkan skor tertinggi
            ->get(); // Ambil semua data

        // Ambil data jumlah penerima dan minimal skor dari tabel penerimaan_beasiswa
        $penerimaanBeasiswa = PenerimaanBeasiswa::first(); // Ambil data pertama (jika ada)

        // Pastikan variabel $penerimaanBeasiswa selalu ada, meskipun tidak ada data
        $penerimaanBeasiswa = $penerimaanBeasiswa ?? (object) [
            'jumlah_penerima' => 0,
            'minimal_skor' => 0,
        ];

        // Kirim data ke view
        return view('pages.mahasiswa.proses-pengajuan.index', [
            'hasilPengajuan' => $hasilPengajuan,
            'pesanVerifikasi' => $pesanVerifikasi,
            'penerimaanBeasiswa' => $penerimaanBeasiswa, // Kirim data penerimaan beasiswa
        ]);
    }
}