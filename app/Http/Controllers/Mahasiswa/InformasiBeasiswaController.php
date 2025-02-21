<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\DataBeasiswa;
use App\Models\Penyakit;
use Illuminate\Http\Request;

class InformasiBeasiswaController extends Controller
{
    public function index()
    {
        $data = [
            'dataBeasiswa' => DataBeasiswa::first()
        ];
        return view('pages.mahasiswa.informasi-beasiswa.index', $data);
    }
}
