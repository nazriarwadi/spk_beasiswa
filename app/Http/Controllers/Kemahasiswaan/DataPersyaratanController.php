<?php

namespace App\Http\Controllers\Kemahasiswaan;

use App\Http\Controllers\Controller;
use App\Models\DataPersyaratan;
use Illuminate\Http\Request;

class DataPersyaratanController extends Controller
{
    public function index()
    {
        $data = [
            'dataPersyaratan' => DataPersyaratan::first()
        ];
        return view('pages.kemahasiswaan.data-persyaratan.index', $data);
    }
    public function edit()
    {
        $data = [
            'dataPersyaratan' => DataPersyaratan::first()
        ];
        return view('pages.kemahasiswaan.data-persyaratan.edit', $data);
    }

    public function update(Request $request)
    {
        $inputVals = $request->validate([
            'deskripsi' => 'required'
        ]);
        $dataPersyaratan = DataPersyaratan::first();
        $dataPersyaratan->update($inputVals);
        return to_route('kemahasiswaan.data-persyaratan.index');
    }
}
