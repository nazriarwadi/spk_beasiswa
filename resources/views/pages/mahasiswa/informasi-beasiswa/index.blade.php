@extends('layouts.mahasiswa')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Informasi Beasiswa</h5>
            </div>
            <div class="card-body">
                {!! $dataBeasiswa->deskripsi !!}
            </div>
        </div>
    </div>
@endsection
