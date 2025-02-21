<?php

namespace App\Http\Controllers\Kemahasiswaan;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Models\PengajuanBeasiswa;
use App\Models\HasilPengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class DataPengajuanController extends Controller
{
    public function getClosestValue($rules, $key, $target)
    {
        if (!isset($rules[$key])) {
            return 1; // Default 1 agar tidak mempengaruhi hasil
        }
        $keys = array_map('floatval', array_keys($rules[$key]));
        $closest = null;
        foreach ($keys as $k) {
            if ($closest === null || abs($target - $k) < abs($target - $closest)) {
                $closest = $k;
            }
        }
        return floatval($rules[$key][$closest]);
    }

    public function index()
    {
        $rules = [
            'status_dtks' => ['5' => '0.7', '1' => '0.3'],
            'status_p3ke' => ['5' => '0.4', '4' => '0.3', '3' => '0.2', '2' => '0.1'],
            'nomor_kip' => ['5' => '0.7', '1' => '0.3'],
            'nomor_kks' => ['5' => '0.7', '1' => '0.3'],
            'status_ayah' => ['5' => '0.6', '3' => '0.4'],
            'pekerjaan_ayah' => ['5' => '0.4', '4' => '0.3', '3' => '0.1', '2' => '0.1', '1' => '0.1'],
            'status_ibu' => ['5' => '0.6', '3' => '0.4'],
            'pekerjaan_ibu' => ['5' => '0.4', '4' => '0.3', '3' => '0.1', '2' => '0.1', '1' => '0.1'],
            'jumlah_tanggungan' => ['5' => '0.5', '4' => '0.3', '3' => '0.2'],
        ];

        // Ambil semua data pengajuan
        $pengajuan = PengajuanBeasiswa::with('pengaju')->get();

        // Hitung nilai maksimum untuk setiap kriteria secara real-time
        $maxValues = [];
        foreach ($rules as $key => $values) {
            $maxValues[$key] = $pengajuan->max($key) ?: 1; // Jika tidak ada data, default ke 1
            Log::info("Nilai maksimum untuk {$key}: {$maxValues[$key]}");
        }

        $dataPengajuan = [];

        foreach ($pengajuan as $ajuan) {
            // Log data awal pengajuan
            Log::info("Memproses pengajuan ID: {$ajuan->id}, Nama: {$ajuan->pengaju->nama}");

            // Normalisasi data
            $normalized = [];
            foreach ($maxValues as $key => $max) {
                $normalized[$key] = floatval($ajuan->$key) / $max;
                Log::info("Normalisasi {$key}: {$ajuan->$key} / {$max} = {$normalized[$key]}");
            }

            // Ambil bobot untuk setiap kriteria
            $weights = [];
            foreach ($rules as $key => $values) {
                $weight = $this->getClosestValue($rules, $key, floatval($ajuan->$key));
                $weights[$key] = $weight;
                Log::info("Bobot untuk {$key}: {$weight}");
            }

            // Hitung skor akhir
            $skor = 0;
            foreach ($normalized as $key => $value) {
                $weightedValue = $value * $weights[$key];
                $skor += $weightedValue;
                Log::info("Skor untuk {$key}: {$value} * {$weights[$key]} = {$weightedValue}");
            }
            $skor = round($skor, 3);
            Log::info("Skor akhir: {$skor}");

            // Simpan hasil ke database
            \App\Models\HasilPengajuan::updateOrCreate(
                ['id_pengajuan_beasiswa' => $ajuan->id],
                ['user_id' => $ajuan->user_id, 'skor' => $skor]
            );

            // Tambahkan flag untuk wajib lolos (jika memiliki KIP dan DTKS)
            $ajuan->wajib_lolos = ($ajuan->nomor_kip == 5 && $ajuan->status_dtks == 5);
            $ajuan->skor = $skor;
            $dataPengajuan[] = $ajuan;

            Log::info("Status wajib lolos: " . ($ajuan->wajib_lolos ? 'Ya' : 'Tidak'));
        }

        // Urutkan berdasarkan skor (prioritaskan yang wajib lolos)
        usort($dataPengajuan, function ($a, $b) {
            if ($a->wajib_lolos && !$b->wajib_lolos) {
                return -1; // Prioritaskan yang wajib lolos
            } elseif (!$a->wajib_lolos && $b->wajib_lolos) {
                return 1;
            }
            return $b->skor <=> $a->skor; // Jika sama, urutkan berdasarkan skor
        });

        // Kirim data ke view
        return view('pages.kemahasiswaan.data-pengajuan.index', ['dataPengajuan' => $dataPengajuan]);
    }

    /**
     * Menampilkan halaman penetapan penerimaan beasiswa.
     */
    public function showTetapkan()
    {
        // Ambil semua data pengajuan dengan relasi pengajuan dan pengaju
        $dataPengajuan = HasilPengajuan::with(['pengajuan.pengaju'])
            ->orderByDesc('skor')
            ->get();

        return view('pages.kemahasiswaan.data-pengajuan.tetapkan', ['dataPengajuan' => $dataPengajuan]);
    }

    /**
     * Menetapkan status penerimaan beasiswa.
     */
    public function tetapkanPenerimaan(Request $request)
    {
        $jumlahPenerima = $request->input('jumlah_penerima'); // Ambil jumlah penerima dari input form

        // Ambil semua data pengajuan dengan join ke tabel pengajuan_beasiswa
        $pengajuan = HasilPengajuan::select('hasil_pengajuan.*')
            ->leftJoin('pengajuan_beasiswa', 'hasil_pengajuan.id_pengajuan_beasiswa', '=', 'pengajuan_beasiswa.id')
            ->with('pengajuan') // Memuat relasi pengajuan
            ->orderByRaw('CASE WHEN pengajuan_beasiswa.nomor_kip = "5" AND pengajuan_beasiswa.status_dtks = "5" THEN 0 ELSE 1 END')
            ->orderByDesc('hasil_pengajuan.skor')
            ->get();

        // Tetapkan status penerimaan
        foreach ($pengajuan as $index => $hasil) {
            // Tambahkan logika wajib lolos
            $wajibLolos = ($hasil->pengajuan->nomor_kip == "5" && $hasil->pengajuan->status_dtks == "5");

            // Tetapkan status penerimaan
            $status = ($index < $jumlahPenerima || $wajibLolos) ? 'Diterima' : 'Tidak Diterima';

            $hasil->update(['status_penerimaan' => $status]);
        }

        return redirect()->route('kemahasiswaan.data-pengajuan.index')->with('success', 'Keputusan penerimaan telah ditetapkan.');
    }

    public function show($id)
    {
        $pengajuan = PengajuanBeasiswa::findOrFail($id);

        return view('pages.kemahasiswaan.data-pengajuan.show', compact('pengajuan'));
    }

    public function destroy($id)
    {
        $pengajuan = PengajuanBeasiswa::find($id);

        if ($pengajuan) {
            // Hapus file jika ada
            $files = [
                $pengajuan->file_status_dtks,
                $pengajuan->file_status_p3ke,
                $pengajuan->file_nomor_kip,
                $pengajuan->file_nomor_kks
            ];

            foreach ($files as $file) {
                if ($file && Storage::disk('public')->exists($file)) {
                    Storage::disk('public')->delete($file);
                }
            }

            // Hapus data dari database
            $pengajuan->delete();
        }

        return back()->with('success', 'Pengajuan dan file terkait berhasil dihapus.');
    }
}
