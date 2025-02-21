@extends('layouts.kemahasiswaan')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Data Persyaratan</h5>
            </div>
            <div class="card-body">
                {!! $dataPersyaratan->deskripsi !!}
                <div class="text-right mt-5">
                    <a href="{{ route('kemahasiswaan.data-persyaratan.edit') }}" class="btn btn-warning">Edit</a>
                </div>
            </div>
        </div>
    </div>
@endsection
