@extends('layouts.kemahasiswaan')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Profil</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-5">
                        <form action="{{ route('kemahasiswaan.profil.index') }}" method="POST" enctype="multipart/form-data">
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
                            <button class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
