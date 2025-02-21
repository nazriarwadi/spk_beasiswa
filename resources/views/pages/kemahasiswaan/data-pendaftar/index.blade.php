@extends('layouts.kemahasiswaan')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Data Pendaftar</h5>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataPendaftar as $no => $item)
                            <tr>
                                <td>{{ $no + 1 }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->username }}</td>
                                <td>XXXXXXXX</td>
                                <td>{{ $item->email_verified_at ? 'Terverivikasi' : 'Belum Terverivikasi' }}</td>
                                <td>
                                    <form action="{{ route('kemahasiswaan.data-pendaftar.destroy', $item->id) }}"
                                        method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('kemahasiswaan.data-pendaftar.edit', $item->id) }}"
                                            class="btn btn-warning">
                                            <i class="fas fa-fw fa-edit"></i>
                                        </a>
                                        <button class="btn btn-danger">
                                            <i class="fas fa-fw fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
