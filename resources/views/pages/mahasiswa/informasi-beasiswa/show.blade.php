@extends('layouts.pasien')

@section('content')
    <div class="container-fluid">
        <h5 class="text-center mb-4" style="color: black; font-weight: 700">
            {{ $penyakit->kode_penyakit }} - {{ $penyakit->nama_penyakit }}
        </h5>
        <h3 class="section-title">Definisi</h3>
        <p>
            {{ $penyakit->definisi }}
        </p>

        <h3 class="section-title">Solusi</h3>
        {{ $penyakit->solusi_pengobatan }}
    </div>
@endsection
