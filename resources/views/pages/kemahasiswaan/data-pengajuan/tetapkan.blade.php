@extends('layouts.kemahasiswaan')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5 class="card-title mb-0">Tetapkan Penerima Beasiswa</h5>
            </div>
            <div class="card-body">
                <!-- Form untuk menetapkan jumlah penerima -->
                <form action="{{ route('kemahasiswaan.data-pengajuan.tetapkan') }}" method="POST" class="mb-4">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label for="jumlah_penerima" class="form-label">Jumlah Penerima</label>
                            <input type="number" name="jumlah_penerima" id="jumlah_penerima" class="form-control" required>
                        </div>
                        <div class="col-md-6 align-self-end">
                            <button type="submit" class="btn btn-primary w-100">
                                <i class="fas fa-check"></i> Tetapkan Penerimaan
                            </button>
                        </div>
                    </div>
                </form>

                <!-- Tabel data pengajuan -->
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Status DTKS</th>
                                <th>Nomor KIP</th>
                                <th>Skor</th>
                                <th>Status Penerimaan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataPengajuan as $no => $item)
                                <tr>
                                    <td>{{ $no + 1 }}</td>
                                    <td>{{ $item->pengajuan->pengaju?->nama ?? 'Tidak Diketahui' }}</td>
                                    <td>
                                        @if ($item->pengajuan->status_dtks == "5")
                                            <span class="badge bg-success text-white">Terdata</span>
                                        @else
                                            <span class="badge bg-danger text-white">Tidak Ada</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($item->pengajuan->nomor_kip == "5")
                                            <span class="badge bg-success text-white">Terdata</span>
                                        @else
                                            <span class="badge bg-danger text-white">Tidak Ada</span>
                                        @endif
                                    </td>
                                    <td>{{ $item->skor }}</td>
                                    <td>
                                        @if (isset($item->status_penerimaan))
                                            @if ($item->status_penerimaan == 'Diterima')
                                                <span class="badge bg-success text-white">Diterima</span>
                                            @else
                                                <span class="badge bg-danger text-white">Tidak Diterima</span>
                                            @endif
                                        @else
                                            <span class="badge bg-secondary text-white">Belum Ditentukan</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection