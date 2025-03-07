@extends('layouts.mahasiswa')

@section('content')
    <div class="container mt-5">
        <div class="card shadow-lg border-0 rounded-lg">
            <!-- Header -->
            <div class="card-header bg-gradient-primary text-white text-center py-4">
                <h4 class="card-title mb-0 d-flex align-items-center justify-content-center">
                    <i class="fas me-2"></i> 🏆 Ranking Pengajuan Beasiswa
                </h4>
            </div>
            <!-- Body -->
            <div class="card-body">
                @if ($pesanVerifikasi)
                    <!-- Tampilkan pesan jika pengajuan belum diverifikasi -->
                    <div class="alert alert-warning text-center" role="alert">
                        {{ $pesanVerifikasi }}
                    </div>
                @endif

                @if (isset($hasilPengajuan) && $hasilPengajuan->isNotEmpty())
                    <!-- Informasi Jumlah Penerima dan Minimal Skor -->
                    @if ($penerimaanBeasiswa)
                        <div class="alert alert-info text-center" role="alert">
                            <strong>Informasi Penerimaan:</strong><br>
                            Jumlah Penerima: {{ $penerimaanBeasiswa->jumlah_penerima }}<br>
                            Minimal Skor: {{ number_format($penerimaanBeasiswa->minimal_skor, 2) }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="bg-light">
                                <tr>
                                    <th class="text-center text-muted fw-bold">🏆 Ranking</th>
                                    <th class="text-muted fw-bold">👤 Nama</th>
                                    <th class="text-center text-muted fw-bold">📊 Skor Akhir</th>
                                    <th class="text-center text-muted fw-bold">📋 Status Penerimaan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($hasilPengajuan as $index => $pengajuan)
                                    <tr>
                                        <!-- Ranking -->
                                        <td class="text-center fw-bold">
                                            <span class="badge bg-primary text-white">{{ $loop->iteration }}</span>
                                        </td>
                                        <!-- Nama -->
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <i class="fas fa-user-circle me-2 text-muted"></i>
                                                <span>{{ $pengajuan->user->nama ?? 'Tidak Diketahui' }}</span>
                                            </div>
                                        </td>
                                        <!-- Skor Akhir -->
                                        <td class="text-center">
                                            <span class="badge bg-success text-white fw-bold">
                                                {{ number_format($pengajuan->skor, 2) }}
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            @if ($pengajuan->status_penerimaan === 'Diterima')
                                                <span class="badge bg-success text-white">Diterima</span>
                                            @elseif ($pengajuan->status_penerimaan === 'Tidak Diterima')
                                                <span class="badge bg-danger text-white">Tidak Diterima</span>
                                            @else
                                                <span class="badge bg-secondary text-white">Belum Ditentukan</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <!-- Empty State -->
                    <div class="text-center py-5">
                        <img src="{{ asset('images/empty_state.png') }}" alt="Data Kosong" class="img-fluid mb-3"
                            style="max-width: 180px;">
                        <h5 class="text-muted fw-bold">Data Pengajuan Beasiswa Masih Diproses Oleh Admin Mohon Bersabar
                            Menunggu Proses Verifikasi Selesai</h5>
                        <p class="text-muted">
                            Silakan tunggu hingga proses pengajuan selesai diproses.
                        </p>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
