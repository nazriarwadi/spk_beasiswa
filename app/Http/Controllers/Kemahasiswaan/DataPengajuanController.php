<?php

namespace App\Http\Controllers\Kemahasiswaan;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Models\PengajuanBeasiswa;
use App\Models\PenerimaanBeasiswa;
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

            // Tambahkan status verifikasi
            $ajuan->verifikasi = $ajuan->verifikasi ?? 0; // Default 0 jika belum ada

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

    public function verifikasi(Request $request, $id, $fileType)
    {
        $pengajuan = PengajuanBeasiswa::findOrFail($id);

        // Tentukan kolom berdasarkan fileType
        $column = "verifikasi_" . strtolower($fileType);

        // Ambil nilai action dari request
        $action = $request->input('action');

        // Ubah status verifikasi berdasarkan action
        if ($action === 'accept') {
            $pengajuan->$column = 2; // Diterima
        } elseif ($action === 'reject') {
            $pengajuan->$column = 1; // Ditolak
        }

        $pengajuan->save();

        return redirect()
            ->route('kemahasiswaan.data-pengajuan.show', $id)
            ->with('success', "Status verifikasi file '{$fileType}' berhasil diperbarui.");
    }

    /**
     * Menampilkan halaman penetapan penerimaan beasiswa.
     */
    public function showTetapkan()
    {
        // Ambil semua data pengajuan dengan relasi pengajuan dan pengaju, hanya yang sudah diverifikasi
        $dataPengajuan = HasilPengajuan::with(['pengajuan.pengaju'])
            ->whereHas('pengajuan', function ($query) {
                $query->where('verifikasi_dtks', 2) // Verifikasi DTKS diterima
                    ->where('verifikasi_p3ke', 2) // Verifikasi P3KE diterima
                    ->where('verifikasi_kip', 2) // Verifikasi KIP diterima
                    ->where('verifikasi_kks', 2); // Verifikasi KKS diterima
            })
            ->orderByDesc('skor')
            ->get();

        return view('pages.kemahasiswaan.data-pengajuan.tetapkan', ['dataPengajuan' => $dataPengajuan]);
    }

    /**
     * Menetapkan status penerimaan beasiswa.
     */
    public function tetapkanPenerimaan(Request $request)
    {
        // Ambil jumlah penerima dan minimal skor dari input form
        $jumlahPenerima = $request->input('jumlah_penerima'); // Jumlah penerima
        $minimalSkor = $request->input('minimal_skor'); // Minimal skor kelulusan

        // Validasi input
        if ($jumlahPenerima <= 0 || $minimalSkor < 0) {
            return redirect()->route('kemahasiswaan.data-pengajuan.index')->with('error', 'Input tidak valid.');
        }

        // Simpan atau perbarui data ke tabel penerimaan_beasiswa
        PenerimaanBeasiswa::updateOrCreate(
            ['id' => 1], // Asumsi hanya ada satu baris data (id = 1)
            [
                'jumlah_penerima' => $jumlahPenerima,
                'minimal_skor' => $minimalSkor,
            ]
        );

        // Ambil semua data pengajuan dengan join ke tabel pengajuan_beasiswa, hanya yang sudah diverifikasi
        $pengajuan = HasilPengajuan::select('hasil_pengajuan.*')
            ->leftJoin('pengajuan_beasiswa', 'hasil_pengajuan.id_pengajuan_beasiswa', '=', 'pengajuan_beasiswa.id')
            ->with('pengajuan') // Memuat relasi pengajuan
            ->whereHas('pengajuan', function ($query) {
                $query->where('verifikasi_dtks', 2) // Verifikasi DTKS diterima
                    ->where('verifikasi_p3ke', 2) // Verifikasi P3KE diterima
                    ->where('verifikasi_kip', 2) // Verifikasi KIP diterima
                    ->where('verifikasi_kks', 2); // Verifikasi KKS diterima
            })
            ->where('hasil_pengajuan.skor', '>=', $minimalSkor) // Filter berdasarkan minimal skor
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

        // Update status penerimaan untuk pengajuan yang tidak memenuhi minimal skor
        HasilPengajuan::whereHas('pengajuan', function ($query) {
            $query->where('verifikasi_dtks', 2) // Verifikasi DTKS diterima
                ->where('verifikasi_p3ke', 2) // Verifikasi P3KE diterima
                ->where('verifikasi_kip', 2) // Verifikasi KIP diterima
                ->where('verifikasi_kks', 2); // Verifikasi KKS diterima
        })->where('skor', '<', $minimalSkor)->update(['status_penerimaan' => 'Tidak Diterima']);

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
