@extends('layouts.kemahasiswaan')
@push('script-atas')
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
@endpush

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Data Persyaratan</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('kemahasiswaan.data-persyaratan.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <textarea class="form-control" name="deskripsi" id="deskripsi">{{ $dataPersyaratan->deskripsi }}</textarea>
                    <div class="text-right mt-5">
                        <button class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        ClassicEditor
            .create(document.querySelector('#deskripsi'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush
