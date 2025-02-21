@extends('layouts.mahasiswa')

@section('content')
    <div class="container py-4">
        <div class="card shadow-lg border-0 rounded-lg">
            <div class="card-header bg-primary text-white text-center py-3">
                <h5 class="card-title mb-0">📢 Pengajuan Beasiswa</h5>
            </div>
            <div class="card-body text-center">
                @if (is_null(auth()->user()->pengajuan))
                    <div class="py-4">
                        <img src="{{ asset('images/form_submission.png') }}" alt="Ajukan Beasiswa" width="150">
                        <h5 class="mt-3 text-muted">Anda belum melakukan pengajuan beasiswa.</h5>
                        <p class="text-muted">
                            Klik tombol di bawah untuk mengajukan beasiswa sekarang.
                        </p>
                        <a href="{{ route('mahasiswa.pengajuan.create') }}" class="btn btn-primary px-4 py-2">
                            📄 Ajukan Beasiswa
                        </a>
                    </div>
                @else
                    <div class="py-4">
                        <img src="{{ asset('images/waiting_review.png') }}" alt="Menunggu Proses" width="150">
                        <h5 class="mt-3 text-muted">Pengajuan Beasiswa Anda Telah Dikirim ✅</h5>
                        <p class="text-muted">
                            Anda sudah melakukan pengajuan beasiswa. <br>
                            Silakan tunggu proses verifikasi dan pantau informasi hasil pengajuan di halaman proses pengajuan.
                        </p>
                        <a href="{{ route('mahasiswa.proses-pengajuan.index') }}" class="btn btn-secondary px-4 py-2">
                            🔍 Lihat Proses Pengajuan
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
