@extends('layouts.mahasiswa')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Profil</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('mahasiswa.profil.index') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="photo" class="form-label">Foto</label>
                        <input type="file" class="form-control" id="photo" name="photo"
                            value="{{ $profil->photo }}">
                    </div>
                    <div class="form-group">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama"
                            value="{{ $profil->nama }}">
                    </div>
                    <div class="form-group">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username"
                            value="{{ $profil->username }}">
                    </div>
                    <div class="form-group">
                        <label for="password" class="form-label">Password <span class="text-danger">(kosongi jika
                                tidak ingin diganti)</span> </label>
                        <input type="text" class="form-control" id="password" name="password" value="">
                    </div>
                    <div class="form-group">
                        <label for="tempat_lahir">Tempat lahir</label>
                        <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror"
                            id="tempat_lahir" name="tempat_lahir" value="{{ $profil->tempat_lahir }}">
                        @error('tempat_lahir')
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal lahir</label>
                        <input type="text" class="form-control @error('tanggal_lahir') is-invalid @enderror"
                            id="tanggal_lahir" name="tanggal_lahir" value="{{ $profil->tanggal_lahir }}">
                        @error('tanggal_lahir')
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                            <option selected disabled>Pilih Jenis Kelamin</option>
                            <option {{ $profil->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }} value="Laki-laki">
                                Laki-laki</option>
                            <option {{ $profil->jenis_kelamin == 'Perempuan' ? 'selected' : '' }} value="Perempuan">
                                Perempuan</option>
                        </select>
                        @error('jenis_kelamin')
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="alamat_tinggal">Alamat Tinggal</label>
                        <textarea type="text" class="form-control @error('alamat_tinggal') is-invalid @enderror" id="alamat_tinggal"
                            name="alamat_tinggal">{{ $profil->alamat_tinggal }}</textarea>
                        @error('alamat_tinggal')
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="no_hp">No Hp</label>
                        <input type="text" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp"
                            name="no_hp" value="{{ $profil->no_hp }}">
                        @error('no_hp')
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                            name="email" value="{{ $profil->email }}">
                        @error('email')
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nik">Nik</label>
                        <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik"
                            name="nik" value="{{ $profil->nik }}">
                        @error('nik')
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="no_kk">No KK</label>
                        <input type="text" class="form-control @error('no_kk') is-invalid @enderror" id="no_kk"
                            name="no_kk" value="{{ $profil->no_kk }}">
                        @error('no_kk')
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nik_kk">NIK KK</label>
                        <input type="text" class="form-control @error('nik_kk') is-invalid @enderror" id="nik_kk"
                            name="nik_kk" value="{{ $profil->nik_kk }}">
                        @error('nik_kk')
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nisn">NISN</label>
                        <input type="text" class="form-control @error('nisn') is-invalid @enderror" id="nisn"
                            name="nisn" value="{{ $profil->nisn }}">
                        @error('nisn')
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="asal_sekolah">Asal sekolah</label>
                        <input type="text" class="form-control @error('asal_sekolah') is-invalid @enderror"
                            id="asal_sekolah" name="asal_sekolah" value="{{ $profil->asal_sekolah }}">
                        @error('asal_sekolah')
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="kab_kota_sekolah">Kabupaten/Kota Sekolah</label>
                        <input type="text" class="form-control @error('kab_kota_sekolah') is-invalid @enderror"
                            id="kab_kota_sekolah" name="kab_kota_sekolah" value="{{ $profil->kab_kota_sekolah }}">
                        @error('kab_kota_sekolah')
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="provinsi_sekolah">Provinsi Sekolah</label>
                        <input type="text" class="form-control @error('provinsi_sekolah') is-invalid @enderror"
                            id="provinsi_sekolah" name="provinsi_sekolah" value="{{ $profil->provinsi_sekolah }}">
                        @error('provinsi_sekolah')
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
