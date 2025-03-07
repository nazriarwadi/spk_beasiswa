@extends('layouts.mahasiswa')

@section('content')
    <div class="container py-4">
        <div class="card shadow-lg border-0 rounded-lg">
            <div class="card-header bg-primary text-white text-center py-3">
                <h5 class="card-title mb-0">📢 Pengajuan Beasiswa</h5>
            </div>
            <div class="card-body text-center">
                <!-- Pesan Error -->
                @if (session('error'))
                    <div class="alert alert-danger text-center" role="alert">
                        {{ session('error') }}
                    </div>
                @endif

                <!-- Jika Pengajuan Belum Ada -->
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

                    <!-- Jika Pengajuan Sudah Ada -->
                @else
                    <div class="py-4">
                        <!-- Status Pengajuan -->
                        <img src="{{ asset('images/waiting_review.png') }}" alt="Menunggu Proses" width="150">
                        <h5 class="mt-3 text-muted">Pengajuan Beasiswa Anda Telah Dikirim ✅</h5>
                        <p class="text-muted">
                            Anda sudah melakukan pengajuan beasiswa. <br>
                            Silakan tunggu proses verifikasi dan pantau informasi hasil pengajuan di halaman proses
                            pengajuan.
                        </p>
                        <a href="{{ route('mahasiswa.proses-pengajuan.index') }}" class="btn btn-secondary px-4 py-2">
                            🔍 Lihat Proses Pengajuan
                        </a>

                        <!-- Cek Apakah Ada File yang Ditolak -->
                        @php
                            $rejectedFiles = [];
                            if (auth()->user()->pengajuan->verifikasi_dtks == 1) {
                                $rejectedFiles[] = 'Status DTKS';
                            }
                            if (auth()->user()->pengajuan->verifikasi_p3ke == 1) {
                                $rejectedFiles[] = 'Status P3KE';
                            }
                            if (auth()->user()->pengajuan->verifikasi_kip == 1) {
                                $rejectedFiles[] = 'Nomor KIP';
                            }
                            if (auth()->user()->pengajuan->verifikasi_kks == 1) {
                                $rejectedFiles[] = 'Nomor KKS';
                            }
                        @endphp

                        <!-- Tampilkan Notifikasi Jika Ada File yang Ditolak -->
                        @if (!empty($rejectedFiles))
                            <hr>
                            <div class="alert alert-warning text-center" role="alert">
                                <strong>Perhatian!</strong> Pengajuan Anda memiliki file yang ditolak:
                                <strong>{{ implode(', ', $rejectedFiles) }}</strong>. <br>
                                Silakan upload ulang file yang ditolak untuk melanjutkan proses verifikasi.
                            </div>
                            <a href="{{ route('mahasiswa.pengajuan.reupload') }}" class="btn btn-warning px-4 py-2">
                                📤 Upload Ulang File
                            </a>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
