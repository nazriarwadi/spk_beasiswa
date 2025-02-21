@extends('layouts.kemahasiswaan')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Edit Data Pendaftar</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('kemahasiswaan.data-pendaftar.update', $pendaftar) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input readonly type="text" class="form-control @error('nama') is-invalid @enderror"
                            id="nama" name="nama" value="{{ $pendaftar->nama }}">
                        @error('nama')
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tempat_lahir">Tempat lahir</label>
                        <input readonly type="text" class="form-control @error('tempat_lahir') is-invalid @enderror"
                            id="tempat_lahir" name="tempat_lahir" value="{{ $pendaftar->tempat_lahir }}">
                        @error('tempat_lahir')
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal lahir</label>
                        <input readonly type="text" class="form-control @error('tanggal_lahir') is-invalid @enderror"
                            id="tanggal_lahir" name="tanggal_lahir" value="{{ $pendaftar->tanggal_lahir }}">
                        @error('tanggal_lahir')
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <input readonly type="text" class="form-control @error('jenis_kelamin') is-invalid @enderror"
                            id="jenis_kelamin" name="jenis_kelamin" value="{{ $pendaftar->jenis_kelamin }}">
                        @error('jenis_kelamin')
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="alamat_tinggal">Alamat Tinggal</label>
                        <textarea readonly type="text" class="form-control @error('alamat_tinggal') is-invalid @enderror" id="alamat_tinggal"
                            name="alamat_tinggal">{{ $pendaftar->alamat_tinggal }}</textarea>
                        @error('alamat_tinggal')
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="no_hp">No Hp</label>
                        <input readonly type="text" class="form-control @error('no_hp') is-invalid @enderror"
                            id="no_hp" name="no_hp" value="{{ $pendaftar->no_hp }}">
                        @error('no_hp')
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input readonly type="email" class="form-control @error('email') is-invalid @enderror"
                            id="email" name="email" value="{{ $pendaftar->email }}">
                        @error('email')
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nik">Nik</label>
                        <input readonly type="text" class="form-control @error('nik') is-invalid @enderror"
                            id="nik" name="nik" value="{{ $pendaftar->nik }}">
                        @error('nik')
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="no_kk">No KK</label>
                        <input readonly type="text" class="form-control @error('no_kk') is-invalid @enderror"
                            id="no_kk" name="no_kk" value="{{ $pendaftar->no_kk }}">
                        @error('no_kk')
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nik_kk">NIK KK</label>
                        <input readonly type="text" class="form-control @error('nik_kk') is-invalid @enderror"
                            id="nik_kk" name="nik_kk" value="{{ $pendaftar->nik_kk }}">
                        @error('nik_kk')
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nisn">NISN</label>
                        <input readonly type="text" class="form-control @error('nisn') is-invalid @enderror"
                            id="nisn" name="nisn" value="{{ $pendaftar->nisn }}">
                        @error('nisn')
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="asal_sekolah">Asal sekolah</label>
                        <input readonly type="text" class="form-control @error('asal_sekolah') is-invalid @enderror"
                            id="asal_sekolah" name="asal_sekolah" value="{{ $pendaftar->asal_sekolah }}">
                        @error('asal_sekolah')
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="kab_kota_sekolah">Kabupaten/Kota Sekolah</label>
                        <input readonly type="text"
                            class="form-control @error('kab_kota_sekolah') is-invalid @enderror" id="kab_kota_sekolah"
                            name="kab_kota_sekolah" value="{{ $pendaftar->kab_kota_sekolah }}">
                        @error('kab_kota_sekolah')
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="provinsi_sekolah">Provinsi Sekolah</label>
                        <input readonly type="text"
                            class="form-control @error('provinsi_sekolah') is-invalid @enderror" id="provinsi_sekolah"
                            name="provinsi_sekolah" value="{{ $pendaftar->provinsi_sekolah }}">
                        @error('provinsi_sekolah')
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <a href="{{ route('kemahasiswaan.data-pendaftar.verifikasi', $pendaftar) }}"
                        class="btn btn-success">Verifikasi</a>
                    <a href="{{ route('kemahasiswaan.data-pendaftar.index') }}" class="btn btn-danger">Kembali</a>
                </form>
            </div>
        </div>

    </div>
@endsection
