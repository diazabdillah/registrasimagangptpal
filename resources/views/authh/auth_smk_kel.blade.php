{{-- Mengambil layout dari portal.blade.php --}}
@extends('layouts.portal')

@section('kontenAuth')

<div class="container">
    <a href="/auth_smk" class="btn btn-dark mt-3"><i class="fas fa-chevron-left"></i> Back</a>

    <div class="card o-hidden border-0 shadow-lg mt-2 mb-4">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block">
                    <div>

                        <img src="{{ asset('img/logo_pal.png') }}" style="padding-top: 20px;padding-left:20px;"
                            width="130px" alt="">
                    </div>
                    <div>
                        <img style="margin-top:30px;margin-left:40px;" src="{{ asset('img/login1.jpg') }}" width="100%"
                            alt="">
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 font-weight-bold">Registrasi Secara Kelompok</h1>
                            <p><small>Note : Semua File di Upload Max 1MB</small></p>
                        </div>

                        <form id="formregis" method="POST" action="{{ route('RegSmkKel') }}">
                            @csrf
                            <!-- Input Email -->
                            <div class="form-group">
                                <small class="ml-2">Email</small>
                                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email"
                                    name="email" value="{{ old('email') }}">

                                @error('email')
                                <div class="invalid-feedback mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <!-- Input Nama -->
                            <div class="form-group">
                                <small class="ml-2">Nama Kelompok</small>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                    name="name" value="{{ old('name') }}" placeholder="cth: kelompok 1 SMK 10 Surabaya">

                                @error('name')
                                <div class="invalid-feedback mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <small class="ml-2">Password</small>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    id="password" name="password">

                                @error('password')
                                <div class="invalid-feedback mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary btn-user btn-block buttonregis">
                            
                                <div class="spinner"><i role="status" class="spinner-border spinner-border-sm"></i> Loading </div>
                                <div class="text">Registrasi</div>
                            </button>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="/login">Already have an account ?<br> <b>Login in
                                        here!</b></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
