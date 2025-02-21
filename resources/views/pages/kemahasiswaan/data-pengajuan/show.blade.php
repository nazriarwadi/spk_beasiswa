@extends('layouts.kemahasiswaan')
@section('content')
    <div class="container">
        <div class="card shadow-lg mt-4">
            <div class="card-header bg-primary text-white text-center">
                <h4 class="mb-0"><i class="fas fa-user-graduate"></i> Detail Pengajuan Beasiswa</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <!-- Informasi Data Pribadi -->
                    <div class="col-md-6">
                        <h5 class="mb-3"><i class="fas fa-id-card"></i> Informasi Mahasiswa</h5>
                        <ul class="list-group">
                            <li class="list-group-item"><strong>Nama:</strong> {{ $pengajuan->pengaju->nama }}</li>
                            <li class="list-group-item"><strong>Status DTKS:</strong> 
                                @switch($pengajuan->status_dtks)
                                    @case(5) <span class="badge bg-success">Terdata</span> @break
                                    @case(1) <span class="badge bg-danger">Tidak Ada</span> @break
                                    @default <span class="badge bg-secondary">Tidak diketahui</span>
                                @endswitch
                            </li>
                            @if($pengajuan->file_status_dtks)
                                <li class="list-group-item text-center">
                                    @if(pathinfo($pengajuan->file_status_dtks, PATHINFO_EXTENSION) == 'pdf' || in_array(pathinfo($pengajuan->file_status_dtks, PATHINFO_EXTENSION), ['doc', 'docx']))
                                        <p><strong>File:</strong> {{ basename($pengajuan->file_status_dtks) }}</p>
                                        <a href="{{ asset('storage/' . $pengajuan->file_status_dtks) }}" target="_blank" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i> Lihat File</a>
                                    @else
                                        <img src="{{ asset('storage/' . $pengajuan->file_status_dtks) }}" class="img-thumbnail mb-2" width="200">
                                        <br><a href="{{ asset('storage/' . $pengajuan->file_status_dtks) }}" target="_blank" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i> Lihat Gambar</a>
                                    @endif
                                </li>
                            @endif
                            
                            <li class="list-group-item"><strong>Status P3KE:</strong> 
                                @switch($pengajuan->status_p3ke)
                                    @case(5) Desil 1 @break
                                    @case(4) Desil 2 @break
                                    @case(3) Desil 3 @break
                                    @case(2) Desil 4 @break
                                    @default Tidak diketahui
                                @endswitch
                            </li>
                            @if($pengajuan->file_status_p3ke)
                                <li class="list-group-item text-center">
                                    @if(pathinfo($pengajuan->file_status_p3ke, PATHINFO_EXTENSION) == 'pdf' || in_array(pathinfo($pengajuan->file_status_p3ke, PATHINFO_EXTENSION), ['doc', 'docx']))
                                        <p><strong>File:</strong> {{ basename($pengajuan->file_status_p3ke) }}</p>
                                        <a href="{{ asset('storage/' . $pengajuan->file_status_p3ke) }}" target="_blank" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i> Lihat File</a>
                                    @else
                                        <img src="{{ asset('storage/' . $pengajuan->file_status_p3ke) }}" class="img-thumbnail mb-2" width="200">
                                        <br><a href="{{ asset('storage/' . $pengajuan->file_status_p3ke) }}" target="_blank" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i> Lihat Gambar</a>
                                    @endif
                                </li>
                            @endif

                            <!-- Nomor KIP -->
                            <li class="list-group-item"><strong>Nomor KIP:</strong> 
                                @switch($pengajuan->nomor_kip)
                                    @case(5) Terdata @break
                                    @case(1) Tidak Ada @break
                                    @default Tidak diketahui
                                @endswitch
                            </li>
                            @if($pengajuan->file_nomor_kip)
                                <li class="list-group-item text-center">
                                    @if(pathinfo($pengajuan->file_nomor_kip, PATHINFO_EXTENSION) == 'pdf' || in_array(pathinfo($pengajuan->file_nomor_kip, PATHINFO_EXTENSION), ['doc', 'docx']))
                                        <p><strong>File:</strong> {{ basename($pengajuan->file_nomor_kip) }}</p>
                                        <a href="{{ asset('storage/' . $pengajuan->file_nomor_kip) }}" target="_blank" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i> Lihat File</a>
                                    @else
                                        <img src="{{ asset('storage/' . $pengajuan->file_nomor_kip) }}" class="img-thumbnail mb-2" width="200">
                                        <br><a href="{{ asset('storage/' . $pengajuan->file_nomor_kip) }}" target="_blank" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i> Lihat Gambar</a>
                                    @endif
                                </li>
                            @endif

                            <!-- Nomor KKS -->
                            <li class="list-group-item"><strong>Nomor KKS:</strong> 
                                @switch($pengajuan->nomor_kks)
                                    @case(5) Terdata @break
                                    @case(1) Tidak Ada @break
                                    @default Tidak diketahui
                                @endswitch
                            </li>
                            @if($pengajuan->file_nomor_kks)
                                <li class="list-group-item text-center">
                                    @if(pathinfo($pengajuan->file_nomor_kks, PATHINFO_EXTENSION) == 'pdf' || in_array(pathinfo($pengajuan->file_nomor_kks, PATHINFO_EXTENSION), ['doc', 'docx']))
                                        <p><strong>File:</strong> {{ basename($pengajuan->file_nomor_kks) }}</p>
                                        <a href="{{ asset('storage/' . $pengajuan->file_nomor_kks) }}" target="_blank" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i> Lihat File</a>
                                    @else
                                        <img src="{{ asset('storage/' . $pengajuan->file_nomor_kks) }}" class="img-thumbnail mb-2" width="200">
                                        <br><a href="{{ asset('storage/' . $pengajuan->file_nomor_kks) }}" target="_blank" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i> Lihat Gambar</a>
                                    @endif
                                </li>
                            @endif
                        </ul>
                    </div>
                    <!-- Informasi Data Orang Tua -->
                    <div class="col-md-6">
                        <h5 class="mb-3"><i class="fas fa-users"></i> Informasi Orang Tua</h5>
                        <ul class="list-group">
                            <li class="list-group-item"><strong>Nama Ayah:</strong> {{ $pengajuan->nama_ayah }}</li>
                            <li class="list-group-item"><strong>Status Ayah:</strong> 
                                @switch($pengajuan->status_ayah)
                                    @case(5) Wafat @break
                                    @case(3) Hidup @break
                                    @default Tidak diketahui
                                @endswitch
                            </li>
                            <li class="list-group-item"><strong>Pekerjaan Ayah:</strong> 
                                @switch($pengajuan->pekerjaan_ayah)
                                    @case(5) Tidak bekerja @break
                                    @case(4) Nelayan @break
                                    @case(3) Petani @break
                                    @case(2) Kewirausahaan @break
                                    @case(1) Lainnya @break
                                    @default Tidak diketahui
                                @endswitch
                            </li>
                            <li class="list-group-item"><strong>Nama Ibu:</strong> {{ $pengajuan->nama_ibu }}</li>
                            <li class="list-group-item"><strong>Status Ibu:</strong> 
                                @switch($pengajuan->status_ibu)
                                    @case(5) Wafat @break
                                    @case(3) Hidup @break
                                    @default Tidak diketahui
                                @endswitch
                            </li>
                            <li class="list-group-item"><strong>Pekerjaan Ibu:</strong> 
                                @switch($pengajuan->pekerjaan_ibu)
                                    @case(5) Tidak bekerja @break
                                    @case(4) Nelayan @break
                                    @case(3) Petani @break
                                    @case(2) Kewirausahaan @break
                                    @case(1) Lainnya @break
                                    @default Tidak diketahui
                                @endswitch
                            </li>
                            <li class="list-group-item"><strong>Jumlah Tanggungan:</strong> 
                                @switch($pengajuan->jumlah_tanggungan)
                                    @case(5) > 5 Orang @break
                                    @case(4) 3 - 5 Orang @break
                                    @case(3) < 3 Orang @break
                                    @default Tidak diketahui
                                @endswitch
                            </li>
                        </ul>
                    </div>
                </div>
                <a href="{{ route('kemahasiswaan.data-pengajuan.index') }}" class="btn btn-secondary mt-3"><i class="fas fa-arrow-left"></i> Kembali</a>
            </div>
        </div>
    </div>
@endsection