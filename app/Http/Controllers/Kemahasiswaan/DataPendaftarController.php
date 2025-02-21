<?php

namespace App\Http\Controllers\Kemahasiswaan;

use App\Http\Controllers\Controller;
use App\Models\Gejala;
use App\Models\Penyakit;
use App\Models\User;
use Illuminate\Http\Request;

class DataPendaftarController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index(Request $request)
    {
        $data = [
            'dataPendaftar' => User::where('role', 0)->get(),
        ];
        return view('pages.kemahasiswaan.data-pendaftar.index', $data);
    }

    public function edit($id) {
        $pendaftar = User::find($id);
        $data = [
            'pendaftar' => $pendaftar
        ];
        return view('pages.kemahasiswaan.data-pendaftar.edit', $data);
    }

    public function verifikasi($id) {
        $pendaftar = User::find($id);
        $pendaftar->update([
            'email_verified_at' => now()
        ]);
        return back();
    }

    public function destroy($id) {
        $pendaftar = User::find($id);
        $pendaftar->delete();
        return back();
    }
}
