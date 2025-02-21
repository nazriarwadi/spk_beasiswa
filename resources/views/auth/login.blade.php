@extends('layouts.app')

@section('content')
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center align-items-center" style="min-height: 100vh">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div
                                class="col-lg-6 d-none d-lg-flex flex-columns align-items-center justify-content-center border-right">
                                <h5 class="text-center">Sistem Pendukung Keputusan <br> Beasiswa KIP-K <br> Politeknik Negeri
                                    Bengkalis
                                </h5>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <form action="{{ route('login') }}" method="POST" class="user">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text"
                                                class="form-control form-control-user @error('username')
                                                is-invalid
                                            @enderror"
                                                id="username" aria-describedby="username" name="username"
                                                value="{{ old('username') }}" placeholder="Username">
                                            @error('username')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="password"
                                                class="form-control form-control-user @error('password')
                                                is-invalid
                                            @enderror"
                                                id="password" name="password" placeholder="Password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <button class="btn btn-primary btn-user btn-block">
                                            Masuk
                                        </button>
                                    </form>
                                    {{-- <div class="text-center">
                                        <a class="small" href="#">Forgot Password?</a>
                                    </div> --}}
                                    <div class="text-center">
                                        <a class="small" href="{{ route('register') }}">belum punya akun?</a>
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
