@extends('layouts.kemahasiswaan')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Data Beasiswa</h5>
            </div>
            <div class="card-body">
                {!! $dataBeasiswa->deskripsi !!}
                <div class="text-right mt-5">
                    <a href="{{ route('kemahasiswaan.data-beasiswa.edit') }}" class="btn btn-warning">Edit</a>
                </div>
            </div>
        </div>
    </div>
@endsection
