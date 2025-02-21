@extends('layouts.app')

@section('content')
    <div class="row justify-content-center align-items-center" style="min-height: 100vh">
        <div class="col-md-6 text-center">
            <h3 style="color: black; font-weight: 700">DIAGNOSA PENYAKIT GIGI</h3>
            <img src="https://asset-2.tstatic.net/health/foto/bank/images/tindakan-depigmentasi-gingiva.jpg" class="w-50 mb-3"
                alt="gigi">
            <p style="color: black;">Gigi adalah organ tubuh yang sangat penting karena berawal dari
                penyakit yang ada pada
                organ inilah akan timbul penyakit-penyakit membahayakan yang mungkin akan menyerang organ-organ tubuh yang
                lainnya. Gigi merupakan bagian dari alat pengunyahan pada sistem pencernaan dalam tubuh manusia, sehingga
                secara tidak langsung berperan dalam status kesehatan perorangan. Terdapat beberapa fisur gigi di mulut
                sehingga sisa makanan mudah tertinggal.</p>
            <div class="row justify-content-center">
                <div class="col-3">
                    <a href="{{ route('login') }}" class="btn btn-light rounded-pill w-100 mb-2">Masuk</a>
                    <a href="{{ route('register') }}" class="btn btn-light rounded-pill w-100">Daftar</a>
                </div>
            </div>
        </div>
    </div>
@endsection
