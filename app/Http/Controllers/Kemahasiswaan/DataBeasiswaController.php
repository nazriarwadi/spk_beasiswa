<?php

namespace App\Http\Controllers\Kemahasiswaan;

use App\Http\Controllers\Controller;
use App\Models\DataBeasiswa;
use App\Models\Gejala;
use App\Models\Penyakit;
use App\Models\User;
use Illuminate\Http\Request;

class DataBeasiswaController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index()
    {
        $data = [
            'dataBeasiswa' => DataBeasiswa::first()
        ];
        return view('pages.kemahasiswaan.data-beasiswa.index', $data);
    }
    public function edit()
    {
        $data = [
            'dataBeasiswa' => DataBeasiswa::first()
        ];
        return view('pages.kemahasiswaan.data-beasiswa.edit', $data);
    }

    public function update(Request $request)
    {
        $inputVals = $request->validate([
            'deskripsi' => 'required'
        ]);
        $dataBeasiswa = DataBeasiswa::first();
        $dataBeasiswa->update($inputVals);
        return to_route('kemahasiswaan.data-beasiswa.index');
    }
}
