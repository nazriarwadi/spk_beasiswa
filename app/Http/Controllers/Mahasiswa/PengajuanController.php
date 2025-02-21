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
}
