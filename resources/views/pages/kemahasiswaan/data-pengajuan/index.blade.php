@extends('layouts.kemahasiswaan')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center py-3 px-4">
                <!-- Judul -->
                <h5 class="card-title mb-0">Data Pengajuan</h5>
                <!-- Tombol Tetapkan Penerimaan -->
                <a href="{{ route('kemahasiswaan.data-pengajuan.tetapkan') }}" class="btn btn-light">
                    <i class="fas fa-check"></i> Tetapkan Penerimaan
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Status DTKS</th>
                                <th>Status P3KE</th>
                                <th>Nomor KIP</th>
                                <th>Nomor KKS</th>
                                <th>Nama Ayah</th>
                                <th>Status Ayah</th>
                                <th>Pekerjaan Ayah</th>
                                <th>Nama Ibu</th>
                                <th>Status Ibu</th>
                                <th>Pekerjaan Ibu</th>
                                <th>Jumlah Tanggungan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataPengajuan as $no => $item)
                                <tr>
                                    <td>{{ $no + 1 }}</td>
                                    <td>{{ $item->pengaju->nama }}</td>
                                    <th>
                                        @switch($item->status_dtks)
                                            @case(5)
                                                Terdata
                                            @break

                                            @case(1)
                                                Tidak Ada
                                            @break

                                            @default
                                        @endswitch
                                    </th>
                                    <th>
                                        @switch($item->status_p3ke)
                                            @case(5)
                                                Detil 1
                                            @break

                                            @case(4)
                                                Detil 2
                                            @break

                                            @case(3)
                                                Detil 3
                                            @break

                                            @case(2)
                                                Detil 4
                                            @break

                                            @default
                                        @endswitch
                                    </th>
                                    <th>
                                        @switch($item->nomor_kip)
                                            @case(5)
                                                Terdata
                                            @break

                                            @case(1)
                                                Tidak Ada
                                            @break

                                            @default
                                        @endswitch
                                    </th>
                                    <th>
                                        @switch($item->nomor_kks)
                                            @case(5)
                                                Terdata
                                            @break

                                            @case(1)
                                                Tidak Ada
                                            @break

                                            @default
                                        @endswitch
                                    </th>
                                    <th>{{ $item->nama_ayah }}</th>
                                    <th>
                                        @switch($item->status_ayah)
                                            @case(5)
                                                Wafat
                                            @break

                                            @case(3)
                                                Hidup
                                            @break

                                            @default
                                        @endswitch
                                    </th>
                                    <th>
                                        @switch($item->pekerjaan_ayah)
                                            @case(5)
                                                Tidak bekerja
                                            @break

                                            @case(4)
                                                Nelayan
                                            @break

                                            @case(3)
                                                Petani
                                            @break

                                            @case(2)
                                                Kewirausahaan
                                            @break

                                            @case(1)
                                                Lainnya
                                            @break

                                            @default
                                        @endswitch
                                    </th>
                                    <th>{{ $item->nama_ibu }}</th>
                                    <th>
                                        @switch($item->status_ayah)
                                            @case(5)
                                                Wafat
                                            @break

                                            @case(3)
                                                Hidup
                                            @break

                                            @default
                                        @endswitch
                                    </th>
                                    <th>
                                        @switch($item->pekerjaan_ibu)
                                            @case(5)
                                                Tidak bekerja
                                            @break

                                            @case(4)
                                                Nelayan
                                            @break

                                            @case(3)
                                                Petani
                                            @break

                                            @case(2)
                                                Kewirausahaan
                                            @break

                                            @case(1)
                                                Lainnya
                                            @break

                                            @default
                                        @endswitch
                                    </th>
                                    <th>
                                        @switch($item->jumlah_tanggungan)
                                            @case(5)
                                                > 5 Orang
                                            @break

                                            @case(4)
                                                3 - 5 Orang
                                            @break

                                            @case(3)
                                    < 3 Orang @break @default Tidak diketahui @endswitch </th>
                                <td>
                                    <a href="{{ route('kemahasiswaan.data-pengajuan.show', $item->id) }}"
                                        class="btn btn-info">
                                        <i class="fas fa-eye"></i>
                                    </a>

                                    <form action="{{ route('kemahasiswaan.data-pengajuan.destroy', $item->id) }}"
                                        method="post" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger">
                                            <i class="fas fa-fw fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
            </div>
            </table>
        </div>
    </div>
</div>
@endsection
