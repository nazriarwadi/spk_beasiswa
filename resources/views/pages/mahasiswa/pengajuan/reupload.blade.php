@extends('layouts.mahasiswa')

@section('content')
    <div class="container py-4">
        <div class="card shadow-lg border-0 rounded-lg">
            <div class="card-header bg-primary text-white text-center py-3">
                <h5 class="card-title mb-0">🔄 Upload Ulang File</h5>
            </div>
            <div class="card-body">
                @if (
                    $user->pengajuan->verifikasi_dtks == 1 ||
                        $user->pengajuan->verifikasi_p3ke == 1 ||
                        $user->pengajuan->verifikasi_kip == 1 ||
                        $user->pengajuan->verifikasi_kks == 1)
                    <form action="{{ route('mahasiswa.pengajuan.store-reupload') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        <!-- Status DTKS -->
                        @if ($user->pengajuan->verifikasi_dtks == 1)
                            <div class="mb-3">
                                <label for="file_status_dtks" class="form-label">
                                    Upload Ulang Status DTKS
                                    @if ($user->pengajuan->file_status_dtks)
                                        <br><small>File saat ini: {{ basename($user->pengajuan->file_status_dtks) }}</small>
                                    @endif
                                </label>
                                <input type="file" name="file_status_dtks" id="file_status_dtks" class="form-control">
                            </div>
                        @endif

                        <!-- Status P3KE -->
                        @if ($user->pengajuan->verifikasi_p3ke == 1)
                            <div class="mb-3">
                                <label for="file_status_p3ke" class="form-label">
                                    Upload Ulang Status P3KE
                                    @if ($user->pengajuan->file_status_p3ke)
                                        <br><small>File saat ini: {{ basename($user->pengajuan->file_status_p3ke) }}</small>
                                    @endif
                                </label>
                                <input type="file" name="file_status_p3ke" id="file_status_p3ke" class="form-control">
                            </div>
                        @endif

                        <!-- Nomor KIP -->
                        @if ($user->pengajuan->verifikasi_kip == 1)
                            <div class="mb-3">
                                <label for="file_nomor_kip" class="form-label">
                                    Upload Ulang Nomor KIP
                                    @if ($user->pengajuan->file_nomor_kip)
                                        <br><small>File saat ini: {{ basename($user->pengajuan->file_nomor_kip) }}</small>
                                    @endif
                                </label>
                                <input type="file" name="file_nomor_kip" id="file_nomor_kip" class="form-control">
                            </div>
                        @endif

                        <!-- Nomor KKS -->
                        @if ($user->pengajuan->verifikasi_kks == 1)
                            <div class="mb-3">
                                <label for="file_nomor_kks" class="form-label">
                                    Upload Ulang Nomor KKS
                                    @if ($user->pengajuan->file_nomor_kks)
                                        <br><small>File saat ini: {{ basename($user->pengajuan->file_nomor_kks) }}</small>
                                    @endif
                                </label>
                                <input type="file" name="file_nomor_kks" id="file_nomor_kks" class="form-control">
                            </div>
                        @endif

                        <button type="submit" class="btn btn-warning px-4 py-2">
                            📤 Upload Ulang
                        </button>
                    </form>
                @else
                    <p class="text-center">Tidak ada file yang ditolak untuk diupload ulang.</p>
                @endif
            </div>
        </div>
    </div>
@endsection
