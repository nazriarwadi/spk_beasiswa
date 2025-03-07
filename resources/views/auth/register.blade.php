@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center align-items-center" style="min-height: 60vh">
            <div class="col-xl-8 col-lg-10 col-md-12">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0" style="max-height: 90vh; overflow-y: auto;">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Daftar Akun Baru</h1>
                                        <p class="text-muted">Semua field dengan tanda <span class="text-danger">*</span>
                                            wajib diisi.</p>
                                    </div>
                                    <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data"
                                        class="user">
                                        @csrf

                                        <!-- Row 1: Nama dan Username -->
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="nama" class="form-label">Nama Lengkap <span
                                                        class="text-danger">*</span></label>
                                                <input type="text"
                                                    class="form-control @error('nama') is-invalid @enderror" id="nama"
                                                    name="nama" value="{{ old('nama') }}" placeholder="Nama Lengkap">
                                                @error('nama')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="username" class="form-label">Username <span
                                                        class="text-danger">*</span></label>
                                                <input type="text"
                                                    class="form-control @error('username') is-invalid @enderror"
                                                    id="username" name="username" value="{{ old('username') }}"
                                                    placeholder="Username">
                                                @error('username')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Row 2: Password dan Konfirmasi Password -->
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="password" class="form-label">Password <span
                                                        class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <input type="password" class="form-control" id="password"
                                                        name="password" placeholder="Password">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text toggle-password"
                                                            style="cursor: pointer;">
                                                            <i class="fas fa-eye"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="password_confirmation" class="form-label">Konfirmasi Password
                                                    <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <input type="password"
                                                        class="form-control @error('password_confirmation') is-invalid @enderror"
                                                        id="password_confirmation" name="password_confirmation"
                                                        placeholder="Konfirmasi Password">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text toggle-password"
                                                            style="cursor: pointer;">
                                                            <i class="fas fa-eye"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                                @error('password_confirmation')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Row 3: Tempat Lahir dan Tanggal Lahir -->
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="tempat_lahir" class="form-label">Tempat Lahir <span
                                                        class="text-danger">*</span></label>
                                                <input type="text"
                                                    class="form-control @error('tempat_lahir') is-invalid @enderror"
                                                    id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir') }}"
                                                    placeholder="Tempat Lahir">
                                                @error('tempat_lahir')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="tanggal_lahir" class="form-label">Tanggal Lahir <span
                                                        class="text-danger">*</span></label>
                                                <input type="date"
                                                    class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                                    id="tanggal_lahir" name="tanggal_lahir"
                                                    value="{{ old('tanggal_lahir') }}">
                                                @error('tanggal_lahir')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Row 4: Jenis Kelamin dan Alamat Tinggal -->
                                        <div class="form-row">
                                            <!-- Jenis Kelamin -->
                                            <div class="form-group col-md-6">
                                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin <span
                                                        class="text-danger">*</span></label>
                                                <select class="form-control @error('jenis_kelamin') is-invalid @enderror"
                                                    id="jenis_kelamin" name="jenis_kelamin">
                                                    <option value="" disabled
                                                        {{ old('jenis_kelamin') ? '' : 'selected' }}>Pilih Jenis Kelamin
                                                    </option>
                                                    <option value="Laki-laki"
                                                        {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>
                                                        Laki-laki
                                                    </option>
                                                    <option value="Perempuan"
                                                        {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>
                                                        Perempuan
                                                    </option>
                                                </select>
                                                @error('jenis_kelamin')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <!-- Alamat Tinggal -->
                                            <div class="form-group col-md-6">
                                                <label for="alamat_tinggal" class="form-label">Alamat Tinggal <span
                                                        class="text-danger">*</span></label>
                                                <textarea class="form-control @error('alamat_tinggal') is-invalid @enderror" id="alamat_tinggal"
                                                    name="alamat_tinggal" rows="3" placeholder="Contoh: Jl. Merdeka No. 123, Kota Bandung">{{ old('alamat_tinggal') }}</textarea>
                                                @error('alamat_tinggal')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Row 5: No HP dan Email -->
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="no_hp" class="form-label">Nomor Handphone <span
                                                        class="text-danger">*</span></label>
                                                <input type="text"
                                                    class="form-control @error('no_hp') is-invalid @enderror"
                                                    id="no_hp" name="no_hp" value="{{ old('no_hp') }}"
                                                    placeholder="Nomor Handphone">
                                                @error('no_hp')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="email" class="form-label">Email <span
                                                        class="text-danger">*</span></label>
                                                <input type="email"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    id="email" name="email" value="{{ old('email') }}"
                                                    placeholder="Email">
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Row: NIK KK, NISN, Asal Sekolah, Kab/Kota Sekolah, Provinsi Sekolah -->
                                        <div class="form-row">
                                            <!-- Kolom 1: No KK -->
                                            <div class="form-group col-md-6">
                                                <label for="no_kk" class="form-label">No KK <span
                                                        class="text-danger">*</span></label>
                                                <input type="text"
                                                    class="form-control @error('no_kk') is-invalid @enderror"
                                                    id="no_kk" name="no_kk" value="{{ old('no_kk') }}"
                                                    placeholder="Nomor Kartu Keluarga (max 16 karakter)">
                                                @error('no_kk')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <!-- Kolom 2: NIK KK -->
                                            <div class="form-group col-md-6">
                                                <label for="nik_kk" class="form-label">NIK KK <span
                                                        class="text-danger">*</span></label>
                                                <input type="text"
                                                    class="form-control @error('nik_kk') is-invalid @enderror"
                                                    id="nik_kk" name="nik_kk" value="{{ old('nik_kk') }}"
                                                    placeholder="NIK Kartu Keluarga (max 16 karakter)">
                                                @error('nik_kk')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <!-- Kolom 1: NISN -->
                                            <div class="form-group col-md-6">
                                                <label for="nisn" class="form-label">NISN <span
                                                        class="text-danger">*</span></label>
                                                <input type="text"
                                                    class="form-control @error('nisn') is-invalid @enderror"
                                                    id="nisn" name="nisn" value="{{ old('nisn') }}"
                                                    placeholder="Nomor Induk Siswa Nasional (max 20 karakter)">
                                                @error('nisn')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <!-- Kolom 2: Asal Sekolah -->
                                            <div class="form-group col-md-6">
                                                <label for="asal_sekolah" class="form-label">Asal Sekolah <span
                                                        class="text-danger">*</span></label>
                                                <input type="text"
                                                    class="form-control @error('asal_sekolah') is-invalid @enderror"
                                                    id="asal_sekolah" name="asal_sekolah"
                                                    value="{{ old('asal_sekolah') }}"
                                                    placeholder="Nama Asal Sekolah (max 255 karakter)">
                                                @error('asal_sekolah')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <!-- Kolom 1: Kabupaten/Kota Sekolah -->
                                            <div class="form-group col-md-6">
                                                <label for="kab_kota_sekolah" class="form-label">Kabupaten/Kota Sekolah
                                                    <span class="text-danger">*</span></label>
                                                <input type="text"
                                                    class="form-control @error('kab_kota_sekolah') is-invalid @enderror"
                                                    id="kab_kota_sekolah" name="kab_kota_sekolah"
                                                    value="{{ old('kab_kota_sekolah') }}"
                                                    placeholder="Kabupaten/Kota Sekolah (max 255 karakter)">
                                                @error('kab_kota_sekolah')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <!-- Kolom 2: Provinsi Sekolah -->
                                            <div class="form-group col-md-6">
                                                <label for="provinsi_sekolah" class="form-label">Provinsi Sekolah <span
                                                        class="text-danger">*</span></label>
                                                <input type="text"
                                                    class="form-control @error('provinsi_sekolah') is-invalid @enderror"
                                                    id="provinsi_sekolah" name="provinsi_sekolah"
                                                    value="{{ old('provinsi_sekolah') }}"
                                                    placeholder="Provinsi Sekolah (max 255 karakter)">
                                                @error('provinsi_sekolah')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Row 6: NIK dan Foto Profil -->
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="nik" class="form-label">NIK <span
                                                        class="text-danger">*</span></label>
                                                <input type="text"
                                                    class="form-control @error('nik') is-invalid @enderror"
                                                    id="nik" name="nik" value="{{ old('nik') }}"
                                                    placeholder="NIK">
                                                @error('nik')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="photo" class="form-label">Foto Profil <span
                                                        class="text-danger">*</span></label>
                                                <input type="file"
                                                    class="form-control @error('photo') is-invalid @enderror"
                                                    id="photo" name="photo">
                                                @error('photo')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group text-center">
                                            <button type="submit" class="btn btn-primary btn-user btn-block"
                                                style="font-size: 16px; font-weight: bold;">
                                                Daftar
                                            </button>
                                        </div>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="{{ route('login') }}">Sudah punya akun? Masuk di
                                            sini!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.toggle-password').on('click', function() {
                // Temukan input terdekat
                const $input = $(this).closest('.input-group').find('input');
                const $icon = $(this).find('i');

                // Toggle tipe input
                if ($input.attr('type') === 'password') {
                    $input.attr('type', 'text');
                    $icon.removeClass('fa-eye').addClass('fa-eye-slash');
                } else {
                    $input.attr('type', 'password');
                    $icon.removeClass('fa-eye-slash').addClass('fa-eye');
                }
            });
        });
    </script>
@endpush
