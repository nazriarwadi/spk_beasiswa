<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\PengajuanBeasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PengajuanController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index(Request $request)
    {
        $user = auth()->user()->load('pengajuan'); // Pastikan pengajuan ter-load

        // Cek apakah ada pengajuan yang ditolak
        if ($user->pengajuan) {
            $rejectedFiles = [];
            if ($user->pengajuan->verifikasi_dtks == 1) {
                $rejectedFiles[] = 'Status DTKS';
            }
            if ($user->pengajuan->verifikasi_p3ke == 1) {
                $rejectedFiles[] = 'Status P3KE';
            }
            if ($user->pengajuan->verifikasi_kip == 1) {
                $rejectedFiles[] = 'Nomor KIP';
            }
            if ($user->pengajuan->verifikasi_kks == 1) {
                $rejectedFiles[] = 'Nomor KKS';
            }

            // Tampilkan pesan jika ada file yang ditolak
            if (!empty($rejectedFiles)) {
                $rejectedFilesMessage = implode(', ', $rejectedFiles);
                return view('pages.mahasiswa.pengajuan.index', compact('user'))
                    ->with('error', "Pengajuan kamu ditolak. Ada kesalahan pada: {$rejectedFilesMessage}. Silakan upload ulang.");
            }
        }

        return view('pages.mahasiswa.pengajuan.index', compact('user'));
    }


    public function create()
    {
        return view('pages.mahasiswa.pengajuan.create');
    }

    public function store(Request $request)
    {
        // Validasi input termasuk file
        $inputVals = $request->validate([
            'status_dtks' => 'required',
            'file_status_dtks' => 'nullable|file|mimes:jpg,png,pdf,doc,docx|max:5048',
            'status_p3ke' => 'required',
            'file_status_p3ke' => 'nullable|file|mimes:jpg,png,pdf,doc,docx|max:5048',
            'nomor_kip' => 'required',
            'file_nomor_kip' => 'nullable|file|mimes:jpg,png,pdf,doc,docx|max:5048',
            'nomor_kks' => 'required',
            'file_nomor_kks' => 'nullable|file|mimes:jpg,png,pdf,doc,docx|max:5048',
            'nama_ayah' => 'required',
            'status_ayah' => 'required',
            'pekerjaan_ayah' => 'required',
            'nama_ibu' => 'required',
            'status_ibu' => 'required',
            'pekerjaan_ibu' => 'required',
            'jumlah_tanggungan' => 'required',
        ]);

        // Set user ID
        $inputVals['user_id'] = auth()->user()->id;

        // Simpan file dengan folder yang berbeda
        if ($request->hasFile('file_status_dtks')) {
            $inputVals['file_status_dtks'] = $request->file('file_status_dtks')->store('status_dtks', 'public');
        }
        if ($request->hasFile('file_status_p3ke')) {
            $inputVals['file_status_p3ke'] = $request->file('file_status_p3ke')->store('status_p3ke', 'public');
        }
        if ($request->hasFile('file_nomor_kip')) {
            $inputVals['file_nomor_kip'] = $request->file('file_nomor_kip')->store('nomor_kip', 'public');
        }
        if ($request->hasFile('file_nomor_kks')) {
            $inputVals['file_nomor_kks'] = $request->file('file_nomor_kks')->store('nomor_kks', 'public');
        }

        // Simpan data ke database
        PengajuanBeasiswa::create($inputVals);

        return to_route('mahasiswa.proses-pengajuan.index')->with('success', 'Pengajuan berhasil disimpan.');
    }

    public function reupload()
    {
        // Ambil pengajuan pengguna saat ini
        $user = auth()->user()->load('pengajuan');

        // Pastikan pengajuan ada
        if (!$user->pengajuan) {
            return redirect()->route('mahasiswa.pengajuan.index')->with('error', 'Anda belum melakukan pengajuan.');
        }

        // Kirim data pengajuan ke view
        return view('pages.mahasiswa.pengajuan.reupload', compact('user'));
    }

    public function storeReupload(Request $request)
    {
        // Validasi input termasuk file
        $inputVals = $request->validate([
            'file_status_dtks' => 'nullable|file|mimes:jpg,png,pdf,doc,docx|max:5048',
            'file_status_p3ke' => 'nullable|file|mimes:jpg,png,pdf,doc,docx|max:5048',
            'file_nomor_kip' => 'nullable|file|mimes:jpg,png,pdf,doc,docx|max:5048',
            'file_nomor_kks' => 'nullable|file|mimes:jpg,png,pdf,doc,docx|max:5048',
        ]);

        // Ambil pengajuan pengguna saat ini
        $pengajuan = PengajuanBeasiswa::where('user_id', auth()->user()->id)->first();

        // Simpan file yang diupload ulang dan reset status verifikasi
        if ($request->hasFile('file_status_dtks')) {
            // Hapus file lama jika ada
            if ($pengajuan->file_status_dtks) {
                Storage::disk('public')->delete($pengajuan->file_status_dtks);
            }
            // Simpan file baru
            $inputVals['file_status_dtks'] = $request->file('file_status_dtks')->store('status_dtks', 'public');
            $inputVals['verifikasi_dtks'] = 0; // Reset status verifikasi menjadi belum diverifikasi
        }

        if ($request->hasFile('file_status_p3ke')) {
            if ($pengajuan->file_status_p3ke) {
                Storage::disk('public')->delete($pengajuan->file_status_p3ke);
            }
            $inputVals['file_status_p3ke'] = $request->file('file_status_p3ke')->store('status_p3ke', 'public');
            $inputVals['verifikasi_p3ke'] = 0;
        }

        if ($request->hasFile('file_nomor_kip')) {
            if ($pengajuan->file_nomor_kip) {
                Storage::disk('public')->delete($pengajuan->file_nomor_kip);
            }
            $inputVals['file_nomor_kip'] = $request->file('file_nomor_kip')->store('nomor_kip', 'public');
            $inputVals['verifikasi_kip'] = 0;
        }

        if ($request->hasFile('file_nomor_kks')) {
            if ($pengajuan->file_nomor_kks) {
                Storage::disk('public')->delete($pengajuan->file_nomor_kks);
            }
            $inputVals['file_nomor_kks'] = $request->file('file_nomor_kks')->store('nomor_kks', 'public');
            $inputVals['verifikasi_kks'] = 0;
        }

        // Update data pengajuan
        $pengajuan->update($inputVals);

        return redirect()->route('mahasiswa.proses-pengajuan.index')->with('success', 'File berhasil diupload ulang.');
    }
}
